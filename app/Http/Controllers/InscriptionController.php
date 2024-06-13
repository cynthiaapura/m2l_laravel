<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('static.inscription');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = $path;
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'age' => $validatedData['age'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'photo' => $validatedData['photo'] ?? null,
        ]);

        // Authentification de l'utilisateur nouvellement créé
        Auth::login($user);

        // Redirection vers la page de validation avec les données de l'utilisateur
        return redirect()->route('validation', ['user' => $user])->with('success', 'Votre compte a été créé avec succès.');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Mettre à jour le profil utilisateur
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|max:2048',
        ]));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('public/photos');
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour.');
    }

    // Supprimer le compte utilisateur
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect('/')->with('success', 'Compte supprimé.');
    }
}