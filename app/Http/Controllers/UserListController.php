<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function index(User $user)
    {
        $users = User::all();
        return view('static.user_list', compact('users'));
    }

    public function action(Request $request)
    {
        $action = $request->input('action');
        $userId = $request->input('user_id');
    
        if (!$userId) {
            return redirect()->back()->with('error', 'Aucun utilisateur sélectionné.');
        }
    
        switch ($action) {
            case 'edit':
                return redirect()->route('user.edit', ['id' => $userId]);
            case 'delete':
                return $this->delete($userId); // Appel de la méthode delete avec l'ID de l'utilisateur
            default:
                return redirect()->back();
        }
    }

    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('static.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6', // Le mot de passe est facultatif
            'photo' => 'nullable|image|max:2048', // L'image est facultative
        ]);

        // Récupération de l'utilisateur à mettre à jour
        $user = User::findOrFail($id);

        // Mise à jour des données de l'utilisateur avec les données du formulaire
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->age = $request->input('age');
        $user->city = $request->input('city');
        $user->email = $request->input('email');

        // Vérification et mise à jour du mot de passe s'il est fourni
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Vérification et mise à jour de la photo si elle est fournie
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/users');
            $user->photo = $photoPath;
        }

        // Sauvegarde des modifications de l'utilisateur dans la base de données
        $user->save();

        // Redirection avec un message de succès
        return redirect()->route('user_list.index')->with('success', 'Profil utilisateur mis à jour avec succès.');
    }
    
    public function delete($id)
    {
        User::destroy($id); // Suppression de l'utilisateur avec l'ID spécifié
    
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
    
}
