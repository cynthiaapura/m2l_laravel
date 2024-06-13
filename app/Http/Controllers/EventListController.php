<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventListController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('static.event_list', ['events' => $events]);
    }
}
