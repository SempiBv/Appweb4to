<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\empleado;
use App\Models\role;
use Illuminate\support\fecades\hash; 

class AdministradorController extends Controller
{
    public function index(){
        $empleados = empleado::where('estado', '=', 'activo')->get();
        return view('/empleado/listado')->with('empleados', $empleados);
    }

    public function create(){
        return view('/empleado/crear');
    }

    public function store(Request $request){
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoP' => 'required|string|max:255',
            'apellidoM' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:empleados,usuario', // Campo único
            'contraseña' => 'required|string|min:8',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'rol' => 'required|in:vendedor,panadero', // Valida que el rol esté entre las opciones válidas
        ]);

        $empleado = new empleado();
        $empleado->id = $request->id;
        $empleado->nombre = $request->nombre;
        $empleado->apellidoP = $request->apellidoP;
        $empleado->apellidoM = $request->apellidoM;
        $empleado->usuario = $request->usuario;
        $empleado->contraseña = $request->contraseña;
        $empleado->imagen = 'empleado_default.jpg'; // Imagen por defecto
        $empleado->rol = $request->rol;
        $empleado->estado = 'activo';

        $empleado->save();

        if($request->hasFile('imagen')){
            $img = $request->file('imagen');
            $nuevo = 'empleado_' . $empleado->id . '.' . $img->extension();
            $ruta = $img->storeAs('imagenes/empleados', $nuevo, 'public');
            $ruta = 'storage/' . $ruta;
            $empleado->imagen = asset($ruta);
            $empleado->save();
        }

        return redirect('/empleado/lista')->with('success', 'Empleado registrado con éxito');
    }

    public function edit($id) {
        $empleado = empleado::find($id);
        return view('/empleado/editar')->with('empleado', $empleado);
    }

    public function update(Request $request, $id){
        // Validar los datos del formulario al actualizar
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoP' => 'required|string|max:255',
            'apellidoM' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:empleados,usuario,' . $id, // Ignorar el actual usuario
            'contraseña' => 'required|string|min:8',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'rol' => 'required|in:vendedor,panadero',
        ]);

        $empleado = empleado::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellidoP = $request->apellidoP;
        $empleado->apellidoM = $request->apellidoM;
        $empleado->usuario = $request->usuario;
        $empleado->contraseña=Hash::make($request->contraseña);
        $empleado->rol = $request->rol;

        $empleado->save();

        if($request->hasFile('imagen')){
            $img = $request->file('imagen');
            $nuevo = 'empleado_' . $empleado->id . '.' . $img->extension();
            $ruta = $img->storeAs('imagenes/empleados', $nuevo, 'public');
            $ruta = 'storage/' . $ruta;
            $empleado->imagen = asset($ruta);
            $empleado->save();
        }

        return redirect('/empleado/lista')->with('success', 'Empleado actualizado con éxito');
    }

    public function show($id) {
        $empleado = empleado::find($id);
        return view('/empleado/mostrar')->with('empleado', $empleado);
    }

    public function destroy($id){
        $empleado = empleado::find($id);
        $empleado->estado = 'inactivo'; // No eliminar, solo marcar como inactivo
        $empleado->save();
        return redirect('/empleado/lista')->with('success', 'Empleado eliminado con éxito');
    }
}
