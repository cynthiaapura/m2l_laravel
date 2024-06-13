<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageUserController;
use App\Http\Controllers\UserListController;

Route::get('/', function () {
    return view('static.index');
})->name('home');

Route::get('/connection', [AuthenticatedSessionController::class, 'create'])->name('login.form');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/loginOk', [AuthenticatedSessionController::class, 'store'])->name('loginOk');

Route::get('/validation', function () {
    return view('static.validation');
});

Route::get('/event', function (){
    return view('static.event');
});

// Route pour la vue inscription
Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.create');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::get('/validation/{user}', function (Request $request) {
    $user = Auth::user();
    return view('static.validation', ['user' => $user]);
})->name('validation');

// Route pour la vue événement
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/event', [EventController::class, 'create'])->name('events.create');
Route::post('/event', [EventController::class, 'store'])->name('events.store');

// Route pour la page user
Route::get('/page_user', [PageUserController::class, 'index'])->name('page_user.index');

// Route pour modifier un user
Route::middleware('auth')->group(function () {
    Route::get('/user_list', [UserListController::class, 'index'])->name('user_list.index');
    Route::post('/user/action', [UserListController::class, 'action'])->name('user.action');
    Route::get('/user/{id}/edit', [UserListController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserListController::class, 'update'])->name('user.update');
});





Route::middleware('auth')->group(function () {
    Route::get('/page_user', [PageUserController::class, 'index'])->name('page_user.index');
});


require __DIR__.'/auth.php';
