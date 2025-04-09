<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/formulaire', function () {
//     return view('formulaire');
// });

// Page de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Soumettre le formulaire de connexion
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/users', [UserController::class, 'store']);

// Exemple de route après connexion réussie (à personnaliser)
Route::get('/formulaire', function () {
    return view('formulaire');
})->name('formulaire.index')->middleware('auth');