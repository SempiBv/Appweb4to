<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiProductosController extends Controller
{
    public function index()
    {

        $Clientes = auth()->user();
        if(!$Clientes){
            return redirect('/cliente/login')->with('error', 'Debe iniciar sesion');

        }

        $response = Http::get('https://fakestoreapi.com/products/');
        if ($response->successful())
        {
            // dd($response->object());
            return view('/api_fake_store/catalogo')->with([
                'productos' => $response->object(),
                'cliente' => $Clientes
            ]);
        } 
       

    }

    public function show($id){
        $Clientes = auth()->user();
        if(!$Clientes){
            return redirect('/cliente/login')->with('error', 'Debe iniciar sesion');

        }
        
 
 $response = Http::get('https://fakestoreapi.com/products/'.$id);
        if ($response->successful())
        {
            // dd($response->object());
            return view('/api_fake_store/detalles')->with([
                'productos' => $response->object(),
                'cliente' => $Clientes
            ]);
        } 
     return "Error". $response->status();
    }
}
