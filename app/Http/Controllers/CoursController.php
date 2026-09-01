<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Serie;

class CoursController extends Controller
{
    public function index()
    {
        // Envoie une collection simple compatible avec $livres->where() dans la vue
        $livres = Livre::latest()->get();

        // Séries (playlists) qui contiennent au moins une vidéo,
        // avec le nombre de vidéos déjà compté pour éviter une
        // requête supplémentaire par série dans la vue.
        $series = Serie::has('livres')->withCount('livres')->latest()->get();

        return view('Cours', compact('livres', 'series'));
    }

    /**
     * Page playlist d'une série : liste ordonnée des vidéos à
     * regarder les unes après les autres, comme sur YouTube.
     */
    public function serie(Serie $serie)
    {
        $serie->load(['livres' => function ($query) {
            $query->orderBy('ordre');
        }]);

        return view('serie', compact('serie'));
    }

    /**
     * Accès au contenu d'un livre/tutoriel — réservé aux membres connectés.
     * La route est protégée par le middleware "auth" (voir web.php) :
     * un visiteur non connecté est automatiquement redirigé vers la
     * page de connexion, puis renvoyé ici une fois connecté.
     */
    public function consulter(Livre $livre)
    {
        if (!$livre->fichier_ou_lien) {
            abort(404, 'Aucun fichier disponible pour ce contenu.');
        }

        return redirect()->away($livre->fichier_ou_lien);
    }
}