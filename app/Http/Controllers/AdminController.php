<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livre;
use App\Models\Emploi;
use App\Models\Ressource;
use App\Models\Filiere;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'inscrits' => User::count(),
            'inscritsCetteSemaine' => User::where('created_at', '>=', now()->subDays(7))->count(),
            'actifs' => User::where('last_seen_at', '>=', now()->subMinutes(15))->count(),
            'totalLivres' => Livre::count(),
            'totalEmplois' => Emploi::count(),
            'livres' => Livre::latest()->get(),
            'emplois' => Emploi::latest()->get(),
            'ressources' => Ressource::latest()->get(),
            'filieres' => Filiere::latest()->get(),
            'utilisateurs' => User::latest()->get(),
            'series' => Serie::withCount('livres')->latest()->get(),
        ]);
    }

    public function storeLivre(Request $request)
    {
        $request->validate([
            'titre'           => 'required|string|max:255',
            'auteur'          => 'nullable|string|max:255',
            'type'            => 'required|in:livre,tuto',
            'categorie'       => 'required|string',
            'prix'            => 'nullable|integer|min:0',
            'fichier_ou_lien' => 'nullable|string',
            'fichier'         => 'nullable|file|mimes:pdf,mp4,mov,avi|max:204800', // Max 200 Mo
        ]);

        $lienFinal = $request->fichier_ou_lien;

        // Si l'administrateur a téléversé un fichier local, il remplace le lien externe
        if ($request->hasFile('fichier')) {
            $path = $request->file('fichier')->store('livres', 'public');
            $lienFinal = Storage::url($path);
        }

        $livre = Livre::create([
            'titre'           => $request->titre,
            'auteur'          => $request->auteur,
            'type'            => $request->type,
            'categorie'       => $request->categorie,
            'prix'            => $request->prix ?? 0,
            'fichier_ou_lien' => $lienFinal,
        ]);

        $this->notifierNouveauContenu($livre);

        return back()->with('success', 'Contenu publié avec succès.');
    }

    /**
     * Envoie un email aux utilisateurs dont le domaine (renseigné à
     * l'inscription) correspond à la catégorie du nouveau livre/tuto.
     * On ne bloque jamais la publication si un envoi échoue : chaque
     * email est tenté indépendamment des autres.
     */
    private function notifierNouveauContenu(Livre $livre)
    {
        $categorie = mb_strtolower(trim($livre->categorie));

        if ($categorie === '') {
            return;
        }

        $destinataires = User::whereNotNull('domaine')
            ->where('domaine', '!=', '')
            ->get()
            ->filter(function ($user) use ($categorie) {
                $domaine = mb_strtolower(trim($user->domaine));
                return $domaine !== '' && (
                    str_contains($categorie, $domaine) || str_contains($domaine, $categorie)
                );
            });

        foreach ($destinataires as $user) {
            try {
                Mail::raw(
                    "Bonjour {$user->prenom},\n\n"
                    . "Un nouveau contenu vient d'être ajouté sur EduBénin dans la catégorie \"{$livre->categorie}\", qui correspond à ton domaine :\n\n"
                    . "« {$livre->titre} »\n\n"
                    . "Va y jeter un œil : " . url('/Cours') . "\n\n"
                    . "À bientôt,\nL'équipe EduBénin",
                    function ($message) use ($user) {
                        $message->to($user->email)->subject('Nouveau contenu dans ton domaine sur EduBénin');
                    }
                );
            } catch (\Exception $e) {
                // On journalise l'échec sans jamais interrompre la publication de l'admin.
                Log::warning('Échec envoi notification nouveau cours à ' . $user->email . ' : ' . $e->getMessage());
            }
        }
    }

    public function storeEmploi(Request $request)
    {
        $data = $request->validate([
            'titre'            => 'required|string|max:255',
            'entreprise'       => 'nullable|string|max:255',
            'type'             => 'required|in:emploi,stage',
            'ville'            => 'nullable|string|max:255',
            'date_limite'      => 'nullable|date',
            'lien_candidature' => 'nullable|string',
            'description'      => 'nullable|string',
        ]);

        Emploi::create($data);

        return back()->with('success', 'Offre publiée avec succès.');
    }

    // =========================================================
    // MODIFIER UN LIVRE / TUTORIEL
    // =========================================================

    public function editLivre(Livre $livre)
    {
        return view('livres-edit', [
            'livre' => $livre,
        ]);
    }

    public function updateLivre(Request $request, Livre $livre)
    {
        $request->validate([
            'titre'           => 'required|string|max:255',
            'auteur'          => 'nullable|string|max:255',
            'type'            => 'required|in:livre,tuto',
            'categorie'       => 'required|string',
            'prix'            => 'nullable|integer|min:0',
            'fichier_ou_lien' => 'nullable|string',
            'fichier'         => 'nullable|file|mimes:pdf,mp4,mov,avi|max:204800',
        ]);

        $lienFinal = $request->fichier_ou_lien ?: $livre->fichier_ou_lien;

        // Si un nouveau fichier est envoyé, on supprime l'ancien et on stocke le nouveau
        if ($request->hasFile('fichier')) {
            if ($livre->fichier_chemin) {
                Storage::disk('public')->delete($livre->fichier_chemin);
            }
            $path = $request->file('fichier')->store('livres', 'public');
            $lienFinal = Storage::url($path);
            $livre->fichier_chemin = $path;
            $livre->fichier_nom_original = $request->file('fichier')->getClientOriginalName();
        }

        $livre->update([
            'titre'           => $request->titre,
            'auteur'          => $request->auteur,
            'type'            => $request->type,
            'categorie'       => $request->categorie,
            'prix'            => $request->prix ?? 0,
            'fichier_ou_lien' => $lienFinal,
            'fichier_chemin'  => $livre->fichier_chemin,
            'fichier_nom_original' => $livre->fichier_nom_original,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Contenu modifié avec succès.');
    }

    // =========================================================
    // SUPPRIMER UN LIVRE / TUTORIEL
    // =========================================================

    public function destroyLivre(Livre $livre)
    {
        // On supprime le fichier physique s'il existe, avant de supprimer la ligne
        if ($livre->fichier_chemin) {
            Storage::disk('public')->delete($livre->fichier_chemin);
        }

        $livre->delete();

        return back()->with('success', 'Contenu supprimé.');
    }

    // =========================================================
    // MODIFIER UNE OFFRE D'EMPLOI / STAGE
    // =========================================================

    public function editEmploi(Emploi $emploi)
    {
        return view('admin.emplois-edit', [
            'emploi' => $emploi,
        ]);
    }

    public function updateEmploi(Request $request, Emploi $emploi)
    {
        $data = $request->validate([
            'titre'            => 'required|string|max:255',
            'entreprise'       => 'nullable|string|max:255',
            'type'             => 'required|in:emploi,stage',
            'ville'            => 'nullable|string|max:255',
            'date_limite'      => 'nullable|date',
            'lien_candidature' => 'nullable|string',
            'description'      => 'nullable|string',
        ]);

        $emploi->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Offre modifiée avec succès.');
    }

    // =========================================================
    // SUPPRIMER UNE OFFRE D'EMPLOI / STAGE
    // =========================================================

    public function destroyEmploi(Emploi $emploi)
    {
        $emploi->delete();

        return back()->with('success', 'Offre supprimée.');
    }

    // =========================================================
    // PUBLIER UNE RESSOURCE (guide, modèle, article, outil)
    // =========================================================

    public function storeRessource(Request $request)
    {
        $request->validate([
            'titre'           => 'required|string|max:255',
            'type'            => 'required|in:guide,modele,article,outil',
            'theme'           => 'required|in:candidature,etudes,bourses',
            'description'     => 'nullable|string',
            'lien_ou_fichier' => 'nullable|string',
            'fichier'         => 'nullable|file|mimes:pdf,doc,docx,mp4|max:204800',
        ]);

        $lienFinal = $request->lien_ou_fichier;
        $cheminFichier = null;
        $nomOriginal = null;

        if ($request->hasFile('fichier')) {
            $fichier = $request->file('fichier');
            $cheminFichier = $fichier->store('ressources', 'public');
            $nomOriginal = $fichier->getClientOriginalName();
            $lienFinal = Storage::url($cheminFichier);
        }

        Ressource::create([
            'titre'                => $request->titre,
            'type'                 => $request->type,
            'theme'                => $request->theme,
            'description'          => $request->description,
            'lien_ou_fichier'      => $lienFinal,
            'fichier_chemin'       => $cheminFichier,
            'fichier_nom_original' => $nomOriginal,
        ]);

        return back()->with('success', 'Ressource publiée avec succès.');
    }

    public function destroyRessource(Ressource $ressource)
    {
        if ($ressource->fichier_chemin) {
            Storage::disk('public')->delete($ressource->fichier_chemin);
        }

        $ressource->delete();

        return back()->with('success', 'Ressource supprimée.');
    }

    // =========================================================
    // PUBLIER UNE FILIÈRE (groupe WhatsApp affiché sur /communauté)
    // =========================================================

    public function storeFiliere(Request $request)
    {
        $request->validate([
            'nom'           => 'required|string|max:255',
            'description'   => 'nullable|string',
            'lien_whatsapp' => 'required|string|max:255',
            'couleur'       => 'nullable|string|max:7',
        ]);

        Filiere::create([
            'nom'           => $request->nom,
            'description'   => $request->description,
            'lien_whatsapp' => $request->lien_whatsapp,
            'couleur'       => $request->couleur ?: '#2557d6',
        ]);

        return back()->with('success', 'Filière ajoutée avec succès.');
    }

    // =========================================================
    // MODIFIER UNE FILIÈRE
    // (utile par exemple si un lien WhatsApp expire ou change)
    // =========================================================

    public function editFiliere(Filiere $filiere)
    {
        return view('admin.filieres-edit', [
            'filiere' => $filiere,
        ]);
    }

    public function updateFiliere(Request $request, Filiere $filiere)
    {
        $request->validate([
            'nom'             => 'required|string|max:255',
            'description'     => 'nullable|string',
            'lien_whatsapp'   => 'required|string|max:255',
            'couleur'         => 'nullable|string|max:7',
            'nombre_membres'  => 'nullable|integer|min:0',
        ]);

        $filiere->update([
            'nom'            => $request->nom,
            'description'    => $request->description,
            'lien_whatsapp'  => $request->lien_whatsapp,
            'couleur'        => $request->couleur ?: $filiere->couleur,
            'nombre_membres' => $request->nombre_membres ?? $filiere->nombre_membres,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Filière modifiée avec succès.');
    }

    // =========================================================
    // SUPPRIMER UNE FILIÈRE
    // =========================================================

    public function destroyFiliere(Filiere $filiere)
    {
        $filiere->delete();

        return back()->with('success', 'Filière supprimée.');
    }

    // =========================================================
    // GESTION DES UTILISATEURS
    // =========================================================

    /**
     * Bascule le rôle d'un utilisateur entre "admin" et "user".
     * Un admin ne peut pas modifier son propre rôle depuis cette
     * page, pour éviter de se retrouver bloqué hors du dashboard.
     */
    public function toggleRoleUtilisateur(User $utilisateur)
    {
        if ($utilisateur->id === auth()->id()) {
            return back()->with('error', 'Tu ne peux pas modifier ton propre rôle depuis cette page.');
        }

        $utilisateur->role = $utilisateur->role === 'admin' ? 'user' : 'admin';
        $utilisateur->save();

        $message = $utilisateur->role === 'admin'
            ? "{$utilisateur->prenom} est maintenant administrateur."
            : "{$utilisateur->prenom} n'est plus administrateur.";

        return back()->with('success', $message);
    }

    /**
     * Supprime définitivement un compte utilisateur.
     * Un admin ne peut pas supprimer son propre compte depuis
     * cette page, par sécurité.
     */
    public function destroyUtilisateur(User $utilisateur)
    {
        if ($utilisateur->id === auth()->id()) {
            return back()->with('error', 'Tu ne peux pas supprimer ton propre compte depuis cette page.');
        }

        $utilisateur->delete();

        return back()->with('success', 'Utilisateur supprimé.');
    }

    // =========================================================
    // SÉRIES (PLAYLISTS DE TUTORIELS)
    // =========================================================

    public function storeSerie(Request $request)
    {
        $request->validate([
            'titre'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie'   => 'nullable|string',
            'couleur'     => 'nullable|string|max:7',
        ]);

        Serie::create([
            'titre'       => $request->titre,
            'description' => $request->description,
            'categorie'   => $request->categorie,
            'couleur'     => $request->couleur ?: '#2557d6',
        ]);

        return back()->with('success', 'Série créée avec succès. Ajoute-lui des vidéos depuis "Modifier".');
    }

    /**
     * Affiche le formulaire de modification, avec la liste de tous
     * les tutoriels vidéo pour permettre de composer la playlist
     * (cocher/décocher, définir l'ordre).
     */
    public function editSerie(Serie $serie)
    {
        return view('admin.series-edit', [
            'serie' => $serie,
            'tousLesTutos' => Livre::where('type', 'tuto')
                ->orderByRaw('serie_id != ? , ordre', [$serie->id])
                ->get(),
        ]);
    }

    /**
     * Met à jour les infos de la série ET la composition de la
     * playlist (quelles vidéos en font partie, dans quel ordre).
     */
    public function updateSerie(Request $request, Serie $serie)
    {
        $request->validate([
            'titre'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie'   => 'nullable|string',
            'couleur'     => 'nullable|string|max:7',
        ]);

        $serie->update([
            'titre'       => $request->titre,
            'description' => $request->description,
            'categorie'   => $request->categorie,
            'couleur'     => $request->couleur ?: $serie->couleur,
        ]);

        $videosSelectionnees = $request->input('videos', []);
        $ordres = $request->input('ordre', []);

        // Retire de la série les vidéos qui ont été décochées
        Livre::where('serie_id', $serie->id)
            ->whereNotIn('id', $videosSelectionnees)
            ->update(['serie_id' => null, 'ordre' => 0]);

        // Rattache (ou met à jour l'ordre) des vidéos cochées
        foreach ($videosSelectionnees as $livreId) {
            Livre::where('id', $livreId)->update([
                'serie_id' => $serie->id,
                'ordre' => $ordres[$livreId] ?? 0,
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Série mise à jour avec succès.');
    }

    public function destroySerie(Serie $serie)
    {
        // On détache les vidéos plutôt que de les supprimer : elles
        // redeviennent des tutos indépendants sur la page Cours.
        Livre::where('serie_id', $serie->id)->update(['serie_id' => null, 'ordre' => 0]);

        $serie->delete();

        return back()->with('success', 'Série supprimée. Les vidéos qu\'elle contenait restent disponibles individuellement.');
    }
}