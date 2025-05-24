<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('admin.index', compact('users'));
    }

    /**
     * Met à jour le rôle d'un utilisateur.
     */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|in:Visiteur,Membre,Administrateur',
        ]);

        // Met à jour le rôle de l'utilisateur
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Rôle mis à jour avec succès.');
    }
}
