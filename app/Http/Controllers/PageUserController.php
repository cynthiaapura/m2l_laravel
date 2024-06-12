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
}