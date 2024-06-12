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
}