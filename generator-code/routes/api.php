<?php

use App\Http\Controllers\Api\CodeGenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// for Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\UserController;

// ----------------------- Route methode post /store -----------------------

// Route::post('/suividossier/store',[SuiviDossierController::class,'store'])->middleware('auth:sanctum');
Route::post('/codegen/store',[CodeGenController::class,'store']);



// ----------------------- route methode get -----------------------

//  code Generator routes
Route::get('/codeGen',[CodeGenController::class,'index']);
Route::get('/codeGen/relations',[CodeGenController::class,'getcodeGen']);

// auth routes

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route pour créer un utilisateur

Route::post('/users', [UserController::class, 'store']); // Ajouter un utilisateur
Route::post('/login', [UserController::class, 'login']); // Authentification et génération de token

// Routes protégées
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']); // Déconnexion
    Route::get('/protected', [UserController::class, 'protectedRoute']); // Exemple de route protégée
    Route::get('/codegens', [CodeGenController::class, 'index'])->name('codegens.index');
    Route::post('/codegens', [CodeGenController::class, 'store'])->name('codegens.store');
    Route::get('/codegens/{codeGen}', [CodeGenController::class, 'show'])->name('codegens.show');
    Route::get('/getcodegen', [CodeGenController::class, 'getcodeGen'])->name('getcodegen');
});

// pages routes (resources/views)

// Route::get('/formulaire', function () {
//     return view('formulaire');
// });

// Route::get('/login', function () {
//     return view('login');
// });