<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('static.connection');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) { // Vous devez définir cette méthode isAdmin() dans votre modèle User
            return redirect()->route('admin.dashboard'); // Redirige vers la page admin
        }

        return redirect('/'); // Redirige vers une autre page si l'utilisateur n'est pas admin
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
    
        // Rechercher l'utilisateur par adresse e-mail
        $user = User::where('email', $credentials['email'])->first();
    
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Connexion de l'utilisateur
            Auth::login($user);
    
            // Rediriger l'utilisateur vers la page de son espace utilisateur
            if ($user->isAdmin()) {
                return redirect()->route('admin.index'); // Redirige vers la page admin
            } else {
                return redirect()->intended(route('page_user.index')); // Redirige vers la page utilisateur normale
            }
        }
    
        // Si les informations d'identification sont incorrectes, rediriger avec un message d'erreur
        return back()->withErrors([
            'email' => 'Adresse e-mail ou mot de passe incorrect.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}