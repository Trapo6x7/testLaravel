<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $credentials = request(['email', 'password']);
    
        if (Auth::guard('web')->attempt($credentials)) {
            // Connexion réussie, rediriger l'utilisateur vers la page d'accueil ou une autre page
            return redirect()->route('bonjour');  // Assure-toi que 'home' correspond à une route nommée ou une URL
        } else {
            // Connexion échouée, rediriger avec un message d'erreur
            return redirect()->back()->withErrors(['email' => 'Identifiants incorrects']);
        }
    
        return back()->withErrors([
            'email' => 'Les informations sont incorrectes.',
        ]);
    }
}