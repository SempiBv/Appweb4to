<?php

use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { 
    return view('welcome');
});


Route::get('/empleado/lista',[AdministradorController::class,'index']);
Route::get('/empleado/crear',[AdministradorController::class,'create']);
Route::post('/empleado/guardar',[AdministradorController::class,'store']);


Route::get('/empleado/editar/{id}',[AdministradorController::class, 'edit']);
Route::put('/empleado/actualizar/{id}',[AdministradorController::class, 'update']); 
Route::get('/empleado/mostrar/{id}',[AdministradorController::class, 'show']); 
Route::delete('/empleado/eliminar/{id}',[AdministradorController::class, 'destroy']); 


// Route::view('/plantilla','/plantilla/layout');
// Route::view('/empleado/lista','/empleado/listado');
// Route::view('/empleado/crear','/empleado/crear');
// Route::view('/cliente/lista','/cliente/listado');
// Route::view('/cliente/crear','/cliente/crear');
// Route::view('/prod/lista','/producto/listado');
// Route::view('/prod/crear','/producto/crear');


//GET para realizar lecturas
//POST para crear registros
//UPDATE para actualizar registros 
//DELETE para borrar registros 