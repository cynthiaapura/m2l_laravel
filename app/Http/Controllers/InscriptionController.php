<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InscriptionController extends Controller
{
    // Méthode pour afficher le formulaire d'inscription
    public function create()
    {
        return view('static.inscription');
    }

    // Méthode pour traiter la soumission du formulaire d'inscription
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Traiter le téléchargement de la photo si elle est présente
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = $path;
        }

        // Enregistrer l'utilisateur dans la base de données
        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'age' => $validatedData['age'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'photo' => $validatedData['photo'] ?? null,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('home')->with('success', 'Inscription réussie !');

    }
}

