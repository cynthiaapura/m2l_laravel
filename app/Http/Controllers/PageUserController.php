<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class PageUserController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('static.page_user', [
            'events' => $events
        ]);
    }

    public function store(Request $request)
    {
        $events = new Events;
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('public/events');
            $event->photo = $imagePath;
        }
        
        $event->save();

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->age = $request->input('age');
        $user->city = $request->input('city');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('photo')) {
            // Correction du chemin pour stocker les photos
            $user->photo = $request->file('photo')->store('public/photos');
        }

        $user->save();

        return redirect()->route('user_list.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

}