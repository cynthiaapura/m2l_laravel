<?php

namespace App\Http\Controllers;

use App\Models\User;

class ValidationController extends Controller
{
    public function show(User $user)
    {
        return view('static.validation', ['user' => $user]);
    }
}