<?php

namespace App\Http\Controllers;

use App\Models\Filiere;

class CommunauteController extends Controller
{
    public function index()
    {
        return view('communauté', [
            'filieres' => Filiere::orderBy('nom')->get(),
        ]);
    }
}