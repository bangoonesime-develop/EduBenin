<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function edit()
    {
        return view('profil', [
            'utilisateur' => Auth::user(),
        ]);
    }

    /**
     * Met à jour les informations personnelles (hors mot de passe).
     */
    public function update(Request $request)
    {
        $utilisateur = Auth::user();

        $validated = $request->validate([
            'nom'       => 'required|string|max:100',
            'prenom'    => 'required|string|max:100',
            'email'     => 'required|email|max:255|unique:users,email,' . $utilisateur->id,
            'telephone' => 'required|string|max:30|unique:users,telephone,' . $utilisateur->id,
            'sexe'      => 'required|string|max:20',
            'situation' => 'required|string|max:50',
            'niveau'    => 'nullable|string|max:50',
            'domaine'   => 'nullable|string|max:100',
        ]);

        $utilisateur->update($validated);

        return back()->with('success', 'Ton profil a été mis à jour.');
    }

    /**
     * Change le mot de passe, après vérification de l'ancien.
     */
    public function updatePassword(Request $request)
    {
        $utilisateur = Auth::user();

        $request->validate([
            'mot_de_passe_actuel' => 'required|string',
            'password'            => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->mot_de_passe_actuel, $utilisateur->password)) {
            return back()->withErrors([
                'mot_de_passe_actuel' => 'Le mot de passe actuel est incorrect.',
            ])->withInput()->with('active_tab', 'password');
        }

        $utilisateur->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Ton mot de passe a été modifié.')->with('active_tab', 'password');
    }
}