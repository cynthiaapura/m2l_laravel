<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('static.index');
})->name('home');

Route::get('/connection', [AuthenticatedSessionController::class, 'create'])->name('page_user'); 

Route::get('/validation', function () {
    return view('static.validation');
});

Route::get('/event', function (){
    return view('static.event');
});

Route::get('/page_user', function (){
    return view('static.page_user');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.create');

Route::get('/validation/{user}', [ValidationController::class, 'show'])->name('validation');

Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::post('/connection', [AuthenticatedSessionController::class, 'connection'])->name('connection');

Route::post('/event', [EventController::class, 'store'])->name('event.store');


require __DIR__.'/auth.php';
