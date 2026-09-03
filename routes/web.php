<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\ProfilController;
use App\Models\Filiere;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Acceuil', [HomeController::class, 'index']);

Route::get('/Cours', [CoursController::class, 'index']);

Route::get('/recherche', [RechercheController::class, 'index'])->name('recherche.index');

// Page playlist d'une série de tutoriels vidéo
Route::get('/serie/{serie}', [CoursController::class, 'serie'])->name('serie.show');

// Accès à un livre/tutoriel : réservé aux membres connectés
Route::get('/cours/{livre}/consulter', [CoursController::class, 'consulter'])
    ->middleware('auth')
    ->name('cours.consulter');

Route::get('/Connexion', function () {
    return view('Connexion');
})->name('login');

Route::post('/Connexion', [AuthController::class, 'login']);

Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');

// Espace "Mon profil" — réservé aux membres connectés
Route::middleware('auth')->group(function () {
    Route::get('/mon-profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/mon-profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::put('/mon-profil/mot-de-passe', [ProfilController::class, 'updatePassword'])->name('profil.password.update');
});

Route::get('/ressources', [RessourceController::class, 'index']);

// Accès à une ressource : réservé aux membres connectés
Route::get('/ressources/{ressource}/consulter', [RessourceController::class, 'consulter'])
    ->middleware('auth')
    ->name('ressources.consulter');
Route::get('/communauté', function () {
    $filieres = Filiere::all();
    return view('communauté', compact('filieres'));
});

Route::get('/emplois', [EmploiController::class, 'index']);

// Formulaire d'inscription (Affichage)
Route::get('/Inscription', function () {
    return view('Inscription');
})->name('register.form');

// Traitement du formulaire (Envoi)
Route::post('/Inscription', [AuthController::class, 'register']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::post('/livres', [AdminController::class, 'storeLivre'])->name('admin.livres.store');
    Route::get('/livres/{livre}/edit', [AdminController::class, 'editLivre'])->name('admin.livres.edit');
    Route::put('/livres/{livre}', [AdminController::class, 'updateLivre'])->name('admin.livres.update');
    Route::delete('/livres/{livre}', [AdminController::class, 'destroyLivre'])->name('admin.livres.destroy');

    Route::post('/emplois', [AdminController::class, 'storeEmploi'])->name('admin.emplois.store');
    Route::get('/emplois/{emploi}/edit', [AdminController::class, 'editEmploi'])->name('admin.emplois.edit');
    Route::put('/emplois/{emploi}', [AdminController::class, 'updateEmploi'])->name('admin.emplois.update');
    Route::delete('/emplois/{emploi}', [AdminController::class, 'destroyEmploi'])->name('admin.emplois.destroy');

    Route::post('/ressources', [AdminController::class, 'storeRessource'])->name('admin.ressources.store');
    Route::delete('/ressources/{ressource}', [AdminController::class, 'destroyRessource'])->name('admin.ressources.destroy');

    Route::post('/filieres', [AdminController::class, 'storeFiliere'])->name('admin.filieres.store');
    Route::get('/filieres/{filiere}/edit', [AdminController::class, 'editFiliere'])->name('admin.filieres.edit');
    Route::put('/filieres/{filiere}', [AdminController::class, 'updateFiliere'])->name('admin.filieres.update');
    Route::delete('/filieres/{filiere}', [AdminController::class, 'destroyFiliere'])->name('admin.filieres.destroy');

    Route::patch('/utilisateurs/{utilisateur}/role', [AdminController::class, 'toggleRoleUtilisateur'])->name('admin.utilisateurs.toggleRole');
    Route::delete('/utilisateurs/{utilisateur}', [AdminController::class, 'destroyUtilisateur'])->name('admin.utilisateurs.destroy');

    Route::post('/opportunites/envoyer', [AdminController::class, 'sendOpportunite'])->name('admin.opportunites.send');

    Route::post('/series', [AdminController::class, 'storeSerie'])->name('admin.series.store');
    Route::get('/series/{serie}/edit', [AdminController::class, 'editSerie'])->name('admin.series.edit');
    Route::put('/series/{serie}', [AdminController::class, 'updateSerie'])->name('admin.series.update');
    Route::delete('/series/{serie}', [AdminController::class, 'destroySerie'])->name('admin.series.destroy');
});

// MOT DE PASSE OUBLIÉ (flux en 3 étapes façon Facebook)
// ==========================================

// Étape 1 : demande du code via l'email
Route::get('/mot-de-passe-oublie', function () {
    return view('mot-de-passe-oublie');
})->name('password.request');

Route::post('/mot-de-passe-oublie', [AuthController::class, 'sendResetCode'])
    ->name('password.email');

// Étape 2 : saisie du code reçu
Route::get('/verifier-code', [AuthController::class, 'showVerifyCodeForm'])
    ->name('password.verify.form');

Route::post('/verifier-code', [AuthController::class, 'verifyCode'])
    ->name('password.verify');

// Étape 3 : nouveau mot de passe
Route::get('/nouveau-mot-de-passe', [AuthController::class, 'showResetForm'])
    ->name('password.reset.form');

Route::post('/nouveau-mot-de-passe', [AuthController::class, 'resetPassword'])
    ->name('password.update');