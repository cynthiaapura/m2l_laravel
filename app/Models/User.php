<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function isAdmin()
    {
        return $this->role === 'admin'; // Assurez-vous d'avoir un champ de rôle dans votre table users
    }
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'age',
        'city',
        'email',
        'password',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
