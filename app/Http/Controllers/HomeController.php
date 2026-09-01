<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livre;
use App\Models\Emploi;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Recommandations personnalisées : on croise le domaine renseigné
        // par l'utilisateur à l'inscription avec la colonne "categorie"
        // des livres. Uniquement pour les membres connectés qui ont
        // renseigné un domaine.
        $recommandations = collect();

        if (Auth::check() && Auth::user()->domaine) {
            $domaine = Auth::user()->domaine;

            $recommandations = Livre::where('categorie', 'LIKE', '%' . $domaine . '%')
                ->latest()
                ->take(3)
                ->get();
        }

        return view('mapage', [
            'totalCours' => Livre::count(),
            'totalEmplois' => Emploi::count(),
            'totalEtudiants' => User::count(),
            'derniersLivres' => Livre::latest()->take(3)->get(),

            'categoriesPopulaires' => Livre::selectRaw('categorie, count(*) as total')
                ->groupBy('categorie')
                ->orderByDesc('total')
                ->take(6)
                ->get(),

            'recommandations' => $recommandations,
        ]);
    }
}