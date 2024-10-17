<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{

    // FUNCIONES CRUD

    public function index(){
        $Clientes = auth()->user();
        if (!$Clientes) {
            return redirect('/cliente/login')->with('error', 'Debe iniciar sesión.');
        }
        return view('/inicio/inicio')->with('cliente', $Clientes);
    }

    public function create(){
        return view('/perfil/create');
    }

    public function store(Request $request){

         // Validación de datos
         $validatedData = $request->validate([
            'nombre' => 'required|string|min:2|max:50',
            'apellidoP' => 'required|string|min:2|max:50',
            'apellidoM' => 'nullable|string|min:2|max:50',
            'correo' => 'required|email|min:8|max:50',
            'contraseña' => 'required|string|min:8|max:256',
            'imagen' => 'nullable|image|max:2048', // Permitir cualquier imagen
            'direccion' => 'required|string|min:2|max:255',
            'telefono' => 'required|digits:10',
        ]);
        //dd($request)
        $Clientes=new Cliente();
    //objeto  nombre campo base de datos      nombre en el formulario
        $Clientes->nombre=$request->id;
        $Clientes->nombre=$request->nombre;
        $Clientes->apellidoP=$request->apellidoP;
        $Clientes->apellidoM=$request->apellidoM;
        $Clientes->email=$request->correo;
        $Clientes->password= Hash::make($request->contraseña);
        $Clientes->imagen=$request->imagen;
        $Clientes->estado=$request->estado;
        $Clientes->direccion=$request->direccion;
        $Clientes->telefono=$request->telefono;
        $Clientes->estado='activo';

        if($request->hasFile('imagen')){
            $img = $request->file('imagen');
            $nuevo = 'cliente_' . $Clientes->id . '.' . $img->extension();
            $ruta = $img->storeAs('imagenes/clientes', $nuevo, 'public');
            $ruta = 'storage/' . $ruta;
            $Clientes->imagen = asset($ruta);
            $Clientes->save();
        }

        $Clientes->save();
        return redirect('/inicio')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit($id)
    {
        $Clientes = Cliente::find($id);
        return view('perfil/editar')->with('cliente', $Clientes);
        

        // Aquí iría la lógica para guardar en la base de datos
  
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'nombre' => 'required|string|min:2|max:50',
            'apellidoP' => 'required|string|min:2|max:50',
            'apellidoM' => 'nullable|string|min:2|max:50',
            'correo' => 'required|email|min:8|max:50',
            'contraseña' => 'nullable|string|min:8|max:256', // Contraseña opcional
            'imagen' => 'nullable|image|max:2048', // Permitir cualquier imagen
            'direccion' => 'required|string|min:2|max:255',
            'telefono' => 'required|digits:10',
        ]);

        //dd($request)
        
    //objeto  nombre campo base de datos      nombre en el formulario
        $Clientes = Cliente::find($id);
        $Clientes->nombre=$request->nombre;
        $Clientes->apellidoP=$request->apellidoP;
        $Clientes->apellidoM=$request->apellidoM;
        $Clientes->email=$request->correo;   
        $Clientes->password=Hash::make($request->contraseña);
        $Clientes->estado=$request->estado;
        $Clientes->direccion=$request->direccion;
        $Clientes->telefono=$request->telefono;
        $Clientes->estado='activo';

        if($request->hasFile('imagen')){
            $img = $request->file('imagen');
            $nuevo = 'cliente_' . $Clientes->id . '.' . $img->extension();
            $ruta = $img->storeAs('imagenes/clientes', $nuevo, 'public');
            $ruta = 'storage/' . $ruta;
            $Clientes->imagen = asset($ruta);
            $Clientes->save();
        }

        $Clientes->save();
        return redirect('/perfil');
        return "Elemento registrado";
         

    }

    public function show($id)
    {
       
        $Clientes = Cliente::find($id);
        return view('/perfil/mostrar')->with('cliente', $Clientes);
    }

    public function destroy($id){
        $Clientes = Cliente::find($id);
        $Clientes->estado = 'inactivo';
        $Clientes->save();

        $Clientes = auth()->user();
        if (!$Clientes) {
            return redirect('/cliente/login')->with('error', 'Debe iniciar sesión.');
        }
    
       return redirect('/cliente/login');
    }

    public function perfil(){
        $Clientes = auth()->user();

        return view('/perfil/perfil')->with('cliente', $Clientes);
    }


// VISTAS PARA PEDIDO Y PRODUCTO QUE MUESTRAN LOS DATOS DEL USUARIO


    public function pedido(){
        $Clientes = auth()->user();
        if(!$Clientes){
            return redirect('/Cliente/login')->with('Error','Debe iniciar sesion');
        }
        return view('/pedido/pedidos')->with('cliente', $Clientes);
    }

    public function producto(){
        $Clientes = auth()->user();
        if(!$Clientes){
            return redirect('/Cliente/login')->with('Error','Debe iniciar sesion');
        }
        return view('/producto/lista')->with('cliente', $Clientes);
    }

    public function showP($id){
        return view('/producto/detalle');
           }

    
}
