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
    
    public function delete($id)
    {
        User::destroy($id); // Suppression de l'utilisateur avec l'ID spécifié
    
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
    
}
