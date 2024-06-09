<?php

namespace App\Http\Controllers;

use App\Models\User;

class ValidationController extends Controller
{
    public function show($userId)
    {
        // Récupérer l'utilisateur par son ID
        $user = User::findOrFail($userId);

        // Passer les données de l'utilisateur à la vue
        return view('static.validation', compact('user'));
    }
}