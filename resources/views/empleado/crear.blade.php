@extends('/plantilla/layout')

@section('titulo', 'EMPLEADOS')

@section('contenido') 
    <h1 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Agregar Empleado</h1>
    <form class="max-w-sm mx-auto" action="/empleado/guardar" method="POST" enctype="multipart/form-data">
        @csrf {{-- Protección contra ataques CSRF --}}
        
        <div class="mb-5">
            <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Nombre</label>
            <input type="text" id="username-success" name="nombre" value="{{ old('nombre') }}" required
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Nombre">
        </div>

        <div class="mb-5">
            <label for="ApellidoPaterno-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Apellido Paterno</label>
            <input type="text" id="ApellidoPaterno-success" name="apellidoP" value="{{ old('apellidoP') }}" required
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Apellido Paterno">
        </div>

        <div class="mb-5">
            <label for="ApellidoMaterno-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Apellido Materno</label>
            <input type="text" id="ApellidoMaterno-success" name="apellidoM" value="{{ old('apellidoM') }}" required
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Apellido Materno">
        </div>

        <div class="mb-5">
            <label for="usuario" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Usuario</label>
            <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Usuario">
        </div>

        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">contraseña</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="contraseña">
        </div>

        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Imagen</label>
            <input type="file" id="image" name="imagen" accept="image/jpg"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Imagen">
        </div>

        <div class="mb-5">
            <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una opcion</label>
            <select id="rol" name="rol"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled {{ old('rol') ? '' : 'selected' }}>Escoge un Rol</option>
                <option value="vendedor" {{ old('rol') == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                <option value="panadero" {{ old('rol') == 'panadero' ? 'selected' : '' }}>Panadero</option>
            </select>
        </div>

        <input type="submit" id="submit" value="Registrar"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </form>
@endsection
