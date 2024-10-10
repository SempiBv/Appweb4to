<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('/login/formulario');
});

Route::middleware(['auth:empleado'])->group(function(){

Route::view('/plantilla', '/plantilla/layout');
Route::get('/empleado/lista',[AdministradorController::class,'index']);
Route::post('/empleado/guardar',[AdministradorController::class,'store']);
Route::get('/empleado/crear',[AdministradorController::class,'create']);
Route::get('/empleado/editar/{id}',[AdministradorController::class, 'edit']);
Route::put('/empleado/actualizar/{id}',[AdministradorController::class, 'update']); 
Route::get('/empleado/mostrar/{id}',[AdministradorController::class, 'show']); 
Route::delete('/empleado/eliminar/{id}',[AdministradorController::class, 'destroy']); 
Route::post('/empleado/logout', [AdminAuthController::class, 'logout']);

});


//RUTAS LOGINS 
Route::get('/empleado/login',[AdminAuthController::class,'showform'])->name('login');//vista
Route::post('/empleado/login', [AdminAuthController::class, 'login']);//proceso