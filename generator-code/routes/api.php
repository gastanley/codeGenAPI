<?php

// use App\Http\Controllers\api\credit\UserController;
use App\Http\Controllers\Api\CodeGenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('/suividossiers',[SuiviDossierController::class,'index'])->middleware('auth:sanctum');
// Route::get('/suividossiers/relations',[SuiviDossierController::class,'getsuividossiers'])->middleware('auth:sanctum');



// ----------------------- Route methode post /store -----------------------

// Route::post('/suividossier/store',[SuiviDossierController::class,'store'])->middleware('auth:sanctum');
Route::post('/codegen/store',[CodeGenController::class,'store']);



// ----------------------- route methode get -----------------------
Route::get('/codeGen',[CodeGenController::class,'index']);
Route::get('/codeGen/relations',[CodeGenController::class,'getcodeGen']);
// Route::get('/users',[UserController::class,'index']);
// Route::get('/users/relations',[UserController::class,'getusers']);
// Route::get('/receptiondossier',[ReceptionDossierController::class,'index']);
// Route::get('/receptiondossier/relations',[ReceptionDossierController::class,'getReceptionDossiers']);

// ----------------------- route methode get API is working -----------------------
// Route::get('/test',function(){
//     return response([
//         'message'=>'Api is working'
//     ],200);
// });
// Route::post('/register',[AuthentificationController::class,'register']);
// Route::post('/login',[AuthentificationController::class,'login']);
// Route::group(['prefix'=>'credit','namespace'=>'App\Http\Controllers\Api\Credit'],function(){
//     Route::apiResource('client',ClientController::class);
// });