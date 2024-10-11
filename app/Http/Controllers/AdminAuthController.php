<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request){
        {
            $credentials = $request->validate([
                'nombre' => ['required', 'nombre'],
                'contraseña' => ['required'],
            ]);
     //Select * from empleados where nombre =? and password =? and status='activo'
            if (Auth::guard('empleado')->attempt(['nombre' => $request->$nombre,
             'contraseña' => $request->$contraseña,
             'estado' => 'activo'])) {
                $request->session()->regenerate();
     
                return redirect()->intended('/plantilla');
            }
     
            return back()->withErrors([
                'nombre' => 'The provided credentials do not match our records.',
            ])->onlyInput('nombre');
        }
    }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}