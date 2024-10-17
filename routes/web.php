<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ApiProductosController;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('/login/form');
});

Route::middleware(['auth:cliente'])->group(function(){

// RUTA INICIO
Route::get('/inicio', [ClienteController::class, 'index']);

 //RUTAS PERFIL

Route::get('/perfil', [ClienteController::class, 'perfil']);
Route::get('/editar/{id}', [ClienteController::class, 'edit']);
Route::put('/actualizar/{id}', [ClienteController::class, 'update']);
Route::get('/mostrar/{id}', [ClienteController::class, 'show']);
Route::delete('/eliminar/{id}', [ClienteController::class, 'destroy']);


// RUTA PEDIDOS
Route::get('/pedido', [ClienteController::class, 'pedido']);

//RUTA PRODUCTOS (NUESTROS DATOS)

Route::get('/producto', [ClienteController::class, 'producto']);
Route::get('/catalogo', [ApiProductosController::class, 'index']);

//ROUTE API FAKE STORE

Route::get('/apifake', [ApiProductosController::class, 'index']);
Route::get('/apifake/{id}/detalles', [ApiProductosController::class, 'show']);

//RUTAS LOGIN
Route::post('/cliente/logout', [ClienteAuthController::class, 'logout']);



});

//LOGIN 
Route::get('/cliente/login', [ClienteAuthController::class, 'showForm'])->name('login');
Route::post('/cliente/login', [ClienteAuthController::class, 'login']);

// RUTAS CREACION DE CUENTA
Route::get('/crear', [ClienteController::class, 'create']);
Route::post('/cliente/guardar', [ClienteController::class, 'store']);





 
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->stateless()->redirect();
});
 
Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    // dd($user);
 
    // $user->token
    return "Usuario autenticado ".$user->name;
});