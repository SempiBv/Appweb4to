<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showform(){
        return view('/login/fromulario');
    }


    public function login(Request $request)
{
    // Validate the request
    $credentials = $request->validate([
        'usuario' => ['required'],
        'password' => ['required'],
    ]);

    //SELECT * FROM EMPLEADOS WHERE USUARIO=? AND password AND ESTADO='ACTIVO'
if (Auth::guard('empleado')->attempt([
        'usuario' => $request->usuario, 
        'password' => $request -> password,
        'estado' => 'activo'])) {
        // If authenticated, regenerate session and redirect to intended URL
        $request->session()->regenerate();
        

        return redirect()->intended('/plantilla');
    }


    // $empleado = empleado::where('usuario','=',$request->usuario)



    // If authentication fails, redirect back with error message
    return back()->withErrors([
        'usuario' => 'The provided credentials do not match our records.',
    ])->onlyInput('usuario');
}


    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/empleado/login'); //hace uso de la uri
        // return redirect()->route('login'); //hace uso del nombre
    }
}
