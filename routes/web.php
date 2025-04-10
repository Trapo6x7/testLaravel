<?php

use App\Http\Controllers\ConnexionController;
use App\Utilisateur;
use App\Http\Controllers\UtilisateursController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'bonjour')->name('bonjour');

Route::middleware('guest')->group(function () {
      Route::get('/connexion', [ConnexionController::class, 'formulaire'])->name('connexion.form');
    Route::post('/connexion', [ConnexionController::class, 'traitement'])->name('connexion.traitement');
});

// Route des utilisateurs
// Liste des utilisateurs
Route::get('/utilisateurs', [UtilisateursController::class, 'liste'])->name('utilisateurs.liste');

// Formulaire de création
Route::get('/utilisateurs/create', [UtilisateursController::class, 'create'])->name('utilisateurs.create');

// Sauvegarder un utilisateur (création)
Route::post('/utilisateurs', [UtilisateursController::class, 'store'])->name('utilisateurs.store');

// Formulaire de modification
Route::get('/utilisateurs/{id}/edit', [UtilisateursController::class, 'edit'])->name('utilisateurs.edit');

// Mettre à jour un utilisateur
Route::put('/utilisateurs/{id}', [UtilisateursController::class, 'update'])->name('utilisateurs.update');

// Supprimer un utilisateur
Route::delete('/utilisateurs/{id}', [UtilisateursController::class, 'destroy'])->name('utilisateurs.destroy');
