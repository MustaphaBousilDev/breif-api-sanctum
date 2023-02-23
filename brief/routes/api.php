<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Artiste;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumeController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\ParolesController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::post('/register',[AuthController::class,'register']);
Route::get('/artistes/search/{name}',[ArtisteController::class,'search']);
Route::get('/artistes',[ArtisteController::class,'index']);
Route::get('/artistes/{id}',[ArtisteController::class,'show']);
Route::post('/logout',[AuthController::class,'logout']);



Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/Albume', [AlbumeController::class, 'index']);
    Route::apiResource('paroles',ParolesController::class);
    Route::post('parolesUpdate/{id}',[ParolesController::class,'update']);
    Route::apiResource('users',UserController::class);
    // Route::put('/usersUpdate/{id}', [UserController::class, 'update']);
    
});


Route::group(['middleware'=>['auth:sanctum','authadmin']],function(){
    Route::post('/artistes',[ArtisteController::class,'store']);
    Route::put('/artistes/{id}',[ArtisteController::class,'update']);
    Route::delete('/artistes/{id}',[ArtisteController::class,'destroy']);
    #Albumes
    Route::post('/storeAlbum', [AlbumeController::class, 'store']);
    Route::post('/updateAlbume/{id}', [AlbumeController::class, 'update']);
    Route::get('/showAlbume/{id}' , [AlbumeController::class , 'show']);
    Route::post('/deleteAlbume/{id}' , [AlbumeController::class , 'destroy']);
    #Musiques
    Route::get('/music', [MusiqueController::class,'index']);
    Route::post('addmusic', [MusiqueController::class,'store']);
    Route::delete('deletemusic/{id}', [MusiqueController::class,'delete']);
    Route::post('updatemusique/{id}',[MusiqueController::class,'update']);
});