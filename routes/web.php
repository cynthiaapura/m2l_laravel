<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ValidationController;

Route::get('/', function () {
    return view('static.index');
})->name('home');

Route::get('/connection', function () {
    return view('static.connection');
});

Route::get('/validation', function () {
    return view('static.validation');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.create');

Route::get('/validation/{user}', [ValidationController::class, 'show'])->name('validation');

Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::post('/login', [ValidationController::class, 'login'])->name('login');

require __DIR__.'/auth.php';
