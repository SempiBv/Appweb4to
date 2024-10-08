<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\empleado;
use App\Models\role;

class AdministradorController extends Controller
{
    public function index(){
        //Select * from empleados
        // $empleados=empleado::all();
        $empleados=empleado::where('estado','=','activo')->get();
        return view('/empleado/listado')->with('empleados', $empleados);
    }

    //Es una vista
    public function create(){
        return view('/empleado/crear');
    }

    //Es un proceso
    public function store(Request $request){
        //dd($request->all());
        $empleado = new empleado();
        $empleado->id=$request->id;
        $empleado->nombre=$request->nombre;
        $empleado->apellidoP=$request->apellidoP;
        $empleado->apellidoM=$request->apellidoM;
        $empleado->usuario=$request->usuario;
        $empleado->contraseña=$request->contraseña;
        $empleado->imagen='empleado_default.jpg';
        $empleado->rol=$request->rol;
        $empleado->estado='activo';

        $empleado->save();


        if($request->hasFile('imagen')){
            $img=$request->imagen;
            $nuevo='empleado_'.$empleado->id.'.'.$img->extension();
            $ruta=$img->storeAs('imagenes/empleados',$nuevo,'public');
            $ruta='storage/'.$ruta;
            $empleado->imagen=asset($ruta);
            $empleado->save();
        }


        return redirect('/empleado/lista');
    }
    public function edit($id) {
        $empleado=empleado::find($id);
        return view('/empleado/editar')->with('empleado', $empleado);
    }

       //Es un proceso
       public function update(Request $request,$id){
        //dd($request->all());
        $empleado=empleado::find($id);

        $empleado->id=$request->id;
        $empleado->nombre=$request->nombre;
        $empleado->apellidoP=$request->apellidoP;
        $empleado->apellidoM=$request->apellidoM;
        $empleado->usuario=$request->usuario;
        $empleado->contraseña=$request->contraseña;
        // $empleado->imagen=$request->imagen;
        $empleado->rol=$request->rol;
        // $empleado->estado='activo';

        $empleado->save();


        if($request->hasFile('imagen')){
            $img=$request->imagen;
            $nuevo='empleado_'.$empleado->id.'.'.$img->extension();
            $ruta=$img->storeAs('imagenes/empleados',$nuevo,'public');
            $ruta='storage/'.$ruta;
            $empleado->imagen=asset($ruta);
            $empleado->save();
        }

        
        return redirect('/empleado/lista');
    }

    public function show($id) {
        $empleado=empleado::find($id);
        return view('/empleado/mostrar')->with('empleado', $empleado);
    }

     //Es un proceso
     public function destroy($id){
        //dd($request->all());
        $empleado=empleado::find($id);

        $empleado->estado='inactivo';

        $empleado->save();

        // $empleado=empleado::find($id);
        // $empleado->delete();

        return redirect('/empleado/lista');
    }
}
