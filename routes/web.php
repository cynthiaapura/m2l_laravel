<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;

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

Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::post('/login', function (Request $request){

})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)

    ->only(['index', 'store', 'edit', 'update', 'destroy'])

    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
