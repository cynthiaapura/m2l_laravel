<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Auth;

class EventController extends Controller
{
    // Récupère tous les événements de la liste pour les afficher dans la vue page_user
    public function index()
    {
        $events = Event::all();
        return view('static.page_user', ['events' => $events]);

        $users = User::all();
        return view('static.user_list', ['user' => $users]);
    }

    // Renvoi la vue pour la création d'un nouvel événement
    public function show()
    {
        return view('static.event');
    }

    public function create()
    {
        return view('static.event');
    }

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
            $imagePath = $request->file('photo')->store('events', 'public');
            $event->photo = $imagePath;
        }

        $event->save();

        // Rediriger l'utilisateur vers une page de confirmation ou autre
        return redirect()->route('page_user.index')->with('success', 'Votre événement a été soumis avec succès.');
    }

    // Modifier un événement
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    // Mettre à jour un événement
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);
        $event->update($request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]));
        
        if ($request->hasFile('photo')) {
            $event->photo = $request->file('photo')->store('public/photos');
            $event->save();
        }

        return redirect()->route('events.index')->with('success', 'Événement mis à jour.');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé.');
    }
}

