<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login/formulario');
});

 Route::view('/plantilla', '/plantilla/layout');

//RUTAS LOGINS 
Route::post('/empleado/login', [AdminAuthController::class, 'login']);
Route::post('/empleado/logout', [AdminAuthController::class, 'logout']);


Route::get('/empleado/lista',[AdministradorController::class,'index']);
Route::get('/empleado/crear',[AdministradorController::class,'create']);
Route::post('/empleado/guardar',[AdministradorController::class,'store']);


Route::get('/empleado/editar/{id}',[AdministradorController::class, 'edit']);
Route::put('/empleado/actualizar/{id}',[AdministradorController::class, 'update']); 
Route::get('/empleado/mostrar/{id}',[AdministradorController::class, 'show']); 
Route::delete('/empleado/eliminar/{id}',[AdministradorController::class, 'destroy']); 

// Route::post('/empleado/login', [AdminAuthController::class,'login']);
// Route::post('/empleado/logout', [AdminAuthController::class,'logout']);


//  Route::view('/plantilla','/plantilla/layout');

// Route::view('/empleado/lista', '/empleado/listado');
// Route::view('/empleado/crear', '/empleado/crear');
// Route::view('/producto/lista', '/producto/listado');
// Route::view('/producto/crear', '/producto/crear');
// Route::view('/cliente/lista', '/cliente/listado');
// Route::view('/cliente/crear', 'cliente/crear');

//RUTAS PRODUCTOS

// Route::get('/producto/lista', [ProductoController::class,'index']);
// Route::get('/producto/crear', [ProductoController::class, 'create']);
// Route::post('/producto/guardar', [ProductoController::class, 'store']);
// Route::get('/producto/editar/{id}', [ProductoController::class, 'edit']);
// Route::put('/producto/actualizar/{id}', [ProductoController::class, 'update']);
// Route::get('/producto/mostrar/{id}', [ProductoController::class, 'show']);
// Route::delete('/producto/borrar/{id}', [ProductoController::class, 'destroy']);



//RUTAS CLIENTES MIGUEL

// Route::get('/clientes/lista', [ClienteController::class, 'index']);
// Route::get('/clientes/crear', [ClienteController::class, 'create']);
// Route::post('/clientes/guardar', [ClienteController::class, 'store']);
// Route::get('/clientes/editar/{id}', [ClienteController::class, 'edit']);
// Route::put('/clientes/actualizar/{id}', [ClienteController::class, 'update']);
// Route::get('/clientes/msotrar/{id}', [ClienteController::class, 'show']);
// Route::put('/clientes/borrar/{id}', [ClienteController::class, 'destroy']);

//RUTAS EMPLEADOS

// Route::get('/empleado/lista' , [EmpleadoController::class, 'index']);
// Route::get('/empleado/crear', [EmpleadoController::class, 'create']);
// Route::post('/empleado/guardar', [EmpleadoController::class, 'store']);