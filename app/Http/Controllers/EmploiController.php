<?php

namespace App\Http\Controllers;

use App\Models\Emploi;

class EmploiController extends Controller
{
    public function index()
    {
        return view('emplois', [
            'emplois' => Emploi::latest()->get(),
        ]);
    }
}