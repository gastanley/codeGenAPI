<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CodeGenModel;

class FormulaireController extends Controller
{
    /**
     * Affiche la page formulaire avec les données spécifiques à l'utilisateur.
     */
    public function index()
    {
        $user = Auth::user();

        // Récupère les données spécifiques à l'utilisateur
        $data = CodeGenModel::where('user_id', $user->id)->get();
        $passwords = CodeGenModel::all();

        return view('formulaire', compact('data','passwords'));
    }
}