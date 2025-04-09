<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche la page de connexion.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Gère l'authentification de l'utilisateur.
     */
    public function authenticate(Request $request)
    {
        // Valider les champs de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérifie les informations d'identification
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirige après une connexion réussie
            return redirect()->route('formulaire.index');
        } else {
            // Retourne à la page précédente avec un message d'erreur
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies sont incorrectes.',
            ]);
        }

        
    }

    /**
     * Déconnexion de l'utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}