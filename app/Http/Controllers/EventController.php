<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Enregistrer l'événement dans la base de données
        $event = new Event;
        $event->name = $validatedData['name'];
        $event->desc = $validatedData['desc'];

        // Traitement de l'image
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('events');
            $event->photo = $imagePath;
        }

        $event->save();

        // Rediriger l'utilisateur vers une page de confirmation ou autre
        return redirect()->back()->with('success', 'Votre événement a été soumis avec succès.');
    }
}
