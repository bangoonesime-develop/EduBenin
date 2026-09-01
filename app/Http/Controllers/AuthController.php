<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Fusion du code pays et du téléphone pour la validation
        if ($request->has('countrycode') && $request->has('telephone')) {
            $request->merge([
                'telephone' => trim($request->countrycode . ' ' . $request->telephone)
            ]);
        }

        // 2. Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'telephone' => 'required|string|max:30|unique:users,telephone',
            'sexe' => 'required|string|max:20',
            'situation' => 'required|string|max:50',
            'niveau' => 'nullable|string|max:50',
            'domaine' => 'nullable|string|max:100',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 3. Création de l'utilisateur
        $user = User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'sexe' => $validated['sexe'],
            'situation' => $validated['situation'],
            'niveau' => $request->niveau,
            'domaine' => $request->domaine,
            'password' => Hash::make($validated['password']),
        ]);

        // 4. Connexion automatique de l'utilisateur après inscription
        Auth::login($user);

        // 5. Redirection
        return redirect('/Acceuil')->with(
            'success',
            'Votre compte EduBénin a été créé avec succès !'
        );
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Clé unique par email + adresse IP, pour limiter les tentatives
        // sans bloquer tout le monde si une seule personne se trompe.
        $cleLimitation = strtolower($request->email) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($cleLimitation, 5)) {
            $secondes = RateLimiter::availableIn($cleLimitation);

            return back()->withErrors([
                'email' => "Trop de tentatives. Réessaie dans {$secondes} secondes.",
            ])->onlyInput('email');
        }

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            RateLimiter::clear($cleLimitation);
            $request->session()->regenerate();

            return redirect()->intended('/Acceuil')->with(
                'success',
                'Connexion réussie, bienvenue !'
            );
        }

        // Tentative échouée : on la compte, avec un blocage de 60 secondes après la 5e
        RateLimiter::hit($cleLimitation, 60);

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // =========================================================
    // MOT DE PASSE OUBLIÉ — flux en 3 étapes façon "Facebook"
    // 1) Email  2) Code à 6 chiffres  3) Nouveau mot de passe
    //
    // On réutilise la table par défaut de Laravel
    // `password_reset_tokens` (email, token, created_at) : le
    // "token" contient ici le code à 6 chiffres, haché.
    // =========================================================

    /**
     * Étape 1 (soumission) : génère un code et l'envoie par email.
     */
    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = strtolower($request->email);

        // Limite les demandes de code : 3 par tranche de 10 minutes
        // par email + IP, pour éviter le spam d'envoi de mails.
        $cleLimitation = 'reset-code:' . $email . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($cleLimitation, 3)) {
            $secondes = RateLimiter::availableIn($cleLimitation);
            return back()->withErrors([
                'email' => "Trop de demandes. Réessaie dans " . ceil($secondes / 60) . " minute(s).",
            ])->onlyInput('email');
        }

        $user = User::where('email', $email)->first();

        // On ne révèle jamais si l'email existe ou non : même message
        // dans les deux cas, pour éviter de dévoiler quels emails
        // sont inscrits sur la plateforme.
        if ($user) {
            $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $email],
                ['token' => Hash::make($code), 'created_at' => now()]
            );

            Mail::raw(
                "Bonjour,\n\nVoici ton code de vérification EduBénin : {$code}\n\nCe code expire dans 15 minutes. Si tu n'es pas à l'origine de cette demande, ignore ce message.",
                function ($message) use ($email) {
                    $message->to($email)->subject('Ton code de vérification EduBénin');
                }
            );

            RateLimiter::hit($cleLimitation, 600);
        }

        // On mémorise l'email en session pour la suite du flux,
        // sans jamais le faire transiter par l'URL.
        $request->session()->put('reset_email', $email);
        $request->session()->forget('reset_verified');

        return redirect()->route('password.verify.form')->with(
            'success',
            "Si un compte existe avec cet email, un code de vérification vient d'être envoyé."
        );
    }

    /**
     * Étape 2 (affichage) : formulaire de saisie du code.
     */
    public function showVerifyCodeForm(Request $request)
    {
        if (!$request->session()->has('reset_email')) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Merci de demander un nouveau code.',
            ]);
        }

        return view('verifier-code', [
            'email' => $request->session()->get('reset_email'),
        ]);
    }

    /**
     * Étape 2 (soumission) : vérifie le code saisi.
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $email = $request->session()->get('reset_email');

        if (!$email) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Merci de demander un nouveau code.',
            ]);
        }

        // Limite les tentatives de code : 5 par tranche de 10 minutes,
        // pour empêcher de deviner le code par force brute.
        $cleLimitation = 'verify-code:' . $email . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($cleLimitation, 5)) {
            $secondes = RateLimiter::availableIn($cleLimitation);
            return back()->withErrors([
                'code' => "Trop de tentatives. Réessaie dans " . ceil($secondes / 60) . " minute(s).",
            ]);
        }

        $tokenRow = DB::table('password_reset_tokens')->where('email', $email)->first();

        $estValide = $tokenRow
            && Carbon::parse($tokenRow->created_at)->addMinutes(15)->isFuture()
            && Hash::check($request->code, $tokenRow->token);

        if (!$estValide) {
            RateLimiter::hit($cleLimitation, 600);

            return back()->withErrors([
                'code' => 'Code incorrect ou expiré.',
            ]);
        }

        RateLimiter::clear($cleLimitation);

        // Code validé : on l'autorise à passer à l'étape suivante,
        // et on supprime le code pour qu'il ne serve qu'une fois.
        $request->session()->put('reset_verified', true);
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('password.reset.form');
    }

    /**
     * Étape 3 (affichage) : formulaire du nouveau mot de passe.
     */
    public function showResetForm(Request $request)
    {
        if (!$request->session()->get('reset_verified') || !$request->session()->has('reset_email')) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Merci de recommencer la procédure.',
            ]);
        }

        return view('nouveau-mot-de-passe');
    }

    /**
     * Étape 3 (soumission) : enregistre le nouveau mot de passe.
     */
    public function resetPassword(Request $request)
    {
        if (!$request->session()->get('reset_verified') || !$request->session()->has('reset_email')) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Merci de recommencer la procédure.',
            ]);
        }

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $email = $request->session()->get('reset_email');

        User::where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);

        // On nettoie complètement la session liée à la procédure.
        $request->session()->forget(['reset_email', 'reset_verified']);

        return redirect()->route('login')->with(
            'success',
            'Ton mot de passe a été réinitialisé. Tu peux te connecter.'
        );
    }
}