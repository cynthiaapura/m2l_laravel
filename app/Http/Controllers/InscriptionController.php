<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'age' => $validatedData['age'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'photo' => $validatedData['photo'] ?? null,
        ]);

        return redirect()->route('validation', ['user' => $user]);
    }
}
