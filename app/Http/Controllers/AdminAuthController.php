<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(Request $request)
{
    // Validate the request
    $credentials = $request->validate([
        'usuario' => ['required'],
        'contraseña' => ['required'],
    ]);

    //SELECT * FROM EMPLEADOS WHERE USUARIO=? AND CONTRASEÑA AND ESTADO='ACTIVO'
if (Auth::guard('empleado')->attempt([
        'usuario' => $request->usuario, 
        'password' => $request -> contraseña,
        'estado' => 'activo'])) {
        // If authenticated, regenerate session and redirect to intended URL
        $request->session()->regenerate();
        

        return redirect()->intended('/plantilla');
    }

    // If authentication fails, redirect back with error message
    return back()->withErrors([
        'usuario' => 'The provided credentials do not match our records.',
    ])->onlyInput('usuario');
}


    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/plantilla');
    }
}
