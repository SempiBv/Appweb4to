<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClienteAuthController extends Controller
{
    public function showForm(){
        return view('/login/form');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if(Auth::guard('cliente')->attempt([
         'email' => $request->email, 
         'password' => $request ->password,
         'estado' => 'activo'])) {
            
            $request->session()->regenerate();
            
            return redirect()->intended('/inicio');
         }

         return back()->withErrors([
            'correo' => 'Las credenciales no son correctas'
         ])->onlyInput('correo');
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
