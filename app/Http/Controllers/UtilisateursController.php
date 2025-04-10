<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
   // Liste des utilisateurs
   public function liste()
   {
       $utilisateurs = Utilisateur::all();
       return view('utilisateurs.liste', ['utilisateurs' => $utilisateurs]);
   }

   // Afficher le formulaire de création
   public function create()
   {
       return view('utilisateurs.create');
   }

   // Sauvegarder un nouvel utilisateur
   public function store(Request $request)
   {
       $request->validate([
           'email' => 'required|email|unique:utilisateurs,email',
           'password' => 'required|min:8|confirmed',  
           'password_confirmation' => 'required'
       ]);
   
       $utilisateur = Utilisateur::create([
           'email' => $request->email,
           'mot_de_passe' => bcrypt($request->password)  // Hash the password
       ]);
   
       return redirect()->route('bonjour')
                    ->with('success', 'Utilisateur créé avec succès');
   }

   // Afficher le formulaire d'édition
   public function edit($id)
   {
       $utilisateur = Utilisateur::findOrFail($id);
       return view('utilisateurs.edit', ['utilisateur' => $utilisateur]);
   }

   // Mettre à jour un utilisateur
   public function update(Request $request, $id)
   {
       $utilisateur = Utilisateur::findOrFail($id);

       $request->validate([
           'email' => 'required|email|unique:utilisateurs,email,' . $id,
           'password' => 'nullable|string|min:8|confirmed',
       ]);

       $utilisateur->email = $request->email;
       if ($request->password) {
           $utilisateur->mot_de_passe = bcrypt($request->password);
       }
       $utilisateur->save();

       return redirect()->route('utilisateurs.liste');
   }

   // Supprimer un utilisateur
   public function destroy($id)
   {
       Utilisateur::destroy($id);
       return redirect()->route('utilisateurs.liste');
   }
}
