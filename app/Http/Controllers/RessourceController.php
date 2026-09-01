<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Support\Facades\Storage;

class RessourceController extends Controller
{
    public function index()
    {
        return view('ressources', [
            'ressources' => Ressource::latest()->get(),
        ]);
    }

    /**
     * Accès à une ressource — réservé aux membres connectés.
     * Si un fichier est hébergé localement, on force un vrai
     * téléchargement natif plutôt qu'une simple redirection.
     */
    public function consulter(Ressource $ressource)
    {
        if ($ressource->fichier_chemin && Storage::disk('public')->exists($ressource->fichier_chemin)) {
            return Storage::disk('public')->download(
                $ressource->fichier_chemin,
                $ressource->fichier_nom_original ?: null
            );
        }

        if (!$ressource->lien_ou_fichier) {
            abort(404, 'Aucune ressource disponible.');
        }

        return redirect()->away($ressource->lien_ou_fichier);
    }
}