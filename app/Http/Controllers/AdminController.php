<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class AdminController extends Controller
{
    public function index()
    {
        // Récupère les trois derniers employés ajoutés en base de données
        $latestUsers = User::latest()->take(3)->get();

        // Récupère les trois derniers événements ajoutés en base de données
        $latestEvents = Event::latest()->take(3)->get();

        // Passe les données à la vue admin.blade.php
        return view('static.admin', [
            'latestUsers' => $latestUsers,
            'latestEvents' => $latestEvents,
        ]);
    }
}
