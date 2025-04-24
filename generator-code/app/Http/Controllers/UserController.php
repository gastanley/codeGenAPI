<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Crée un nouvel utilisateur et retourne un token.
     */
    public function store(Request $request)
    {
        // Valider les données reçues
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Créer l'utilisateur avec un mot de passe haché
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Générer un token pour le nouvel utilisateur
        $token = $user->createToken('API Token')->plainTextToken;

        // Retourne la réponse avec le token
        return response()->json([
            'message' => 'Utilisateur créé avec succès.',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    /**
     * Authentifie un utilisateur et génère un token.
     */
    public function login(Request $request)
    {
        // Valider les données de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenter d'authentifier l'utilisateur
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Email ou mot de passe incorrect.'], 401);
        }

        $user = Auth::user();

        // Générer un token pour l'utilisateur
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Connexion réussie.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    /**
     * Révoque le token de l'utilisateur (déconnexion).
     */
    public function logout(Request $request)
    {
        // Supprimer le token actuel
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Déconnexion réussie.']);
    }

    /**
     * Exemple de route protégée.
     */
    public function protectedRoute(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'message' => 'Vous êtes authentifié et accédez à une route protégée.',
            'user' => $user
        ]);
    }
}