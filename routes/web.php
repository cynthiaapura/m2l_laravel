<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageUserController;


Route::get('/', function () {
    return view('static.index');
})->name('home');

Route::get('/connection', [AuthenticatedSessionController::class, 'create'])->name('connection'); 

Route::get('/validation', function () {
    return view('static.validation');
});

Route::get('/event', function (){
    return view('static.event');
});

Route::get('/page_user', [PageUserController::class, 'index'])->name('page_user.index');

Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.create');

Route::get('/validation/{user}', [ValidationController::class, 'show'])->name('validation');

Route::get('/page_user', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

Route::get('/events', [EventController::class, 'index'])->name('events.index');


Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::post('/connection', [AuthenticatedSessionController::class, 'connection'])->name('connection');

Route::post('/connection', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::post('/event', [EventController::class, 'store'])->name('event.store');


require __DIR__.'/auth.php';