{{-- Aqui se coloca la ruta de la plantilla --}}
@extends('/plantilla/layout')

{{-- Colocar un section por cada yield --}}
@section('titulo', 'EMPLEADOS')

{{-- @endsection --}} 

@section('contenido')
    <h1 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Agregar Empleado</h1>
    <form class="max-w-sm mx-auto" action="/empleado/eliminar/{{$empleado->id}}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Este debe de estar en la primera linea, despues de la etiqueta de formulario --}}
        @method('DELETE')
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">
                Nombre</label>
            <input type="text" id="username-success" name="nombre" maxlength="50" minlength="5" disabled
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Nombre" value="{{ $empleado->nombre}}">
 
        </div>
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">
                Apellido Paterno</label>
            <input type="text" id="ApellidoPaterno-success" name="apellidoP" maxlength="50" minlength="5"
                disabled
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Apellido Paterno" value="{{ $empleado->apellidoP}}">
 
        </div>
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">
                Apellido Materno</label>
            <input type="text" id="ApellidoMaterno-success" name="apellidoM" maxlength="50" minlength="4"
                disabled
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Apellido Materno" value="{{ $empleado->apellidoM}}">
 
        </div>
        
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">
                Usuario</label>
            <input type="text" id="usuario" name="usuario" maxlength="50" minlength="4" disabled
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Usuario" value="{{ $empleado->usuario}}">
 
        </div>
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">
                password</label>
            <input type="password" id="password" name="password" maxlength="256" minlength="4" disabled
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="password" value="{{ $empleado->password}}">
 
        </div>
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">
                Imagen </label>
            <img src="{{ $empleado->imagen }}" alt="{{ $empleado->imagen }}" width="100px">
            <input type="file" id="image" name="imagen" accept="image/*" 
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Imagen">
        </div>
        <div class="mb-5">
            <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una opcion</label>
            <select id="rol" name="rol" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="vendedor"{{ $empleado->type=='Vendedor'?'selected':''}}>Vendedor</option>
                <option value="panadero" {{ $empleado->type=='Panadero'?'selected':''}}>Panadero</option>
            </select>
        </div>
        <input type="submit" id="submit" value="Eliminar"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </form>

@endsection
