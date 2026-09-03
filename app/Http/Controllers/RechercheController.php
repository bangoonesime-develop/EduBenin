<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Emploi;
use App\Models\Ressource;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function index(Request $request)
    {
        $terme = trim((string) $request->query('q', ''));

        $livres = collect();
        $emplois = collect();
        $ressources = collect();

        if ($terme !== '') {
            $livres = Livre::where('titre', 'LIKE', "%{$terme}%")
                ->orWhere('auteur', 'LIKE', "%{$terme}%")
                ->orWhere('categorie', 'LIKE', "%{$terme}%")
                ->latest()
                ->get();

            $emplois = Emploi::where('titre', 'LIKE', "%{$terme}%")
                ->orWhere('entreprise', 'LIKE', "%{$terme}%")
                ->orWhere('description', 'LIKE', "%{$terme}%")
                ->latest()
                ->get();

            $ressources = Ressource::where('titre', 'LIKE', "%{$terme}%")
                ->orWhere('description', 'LIKE', "%{$terme}%")
                ->latest()
                ->get();
        }

        return view('recherche', compact('terme', 'livres', 'emplois', 'ressources'));
    }
}