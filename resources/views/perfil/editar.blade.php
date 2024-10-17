{{-- Aqui se coloca la ruta de la plantilla --}}
@extends('/plantilla/layout')

{{-- Colocar un section por cada yield --}}
@section('titulo', 'EDITAR PERFIL')

{{-- @endsection --}} 

@section('contenido')
<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
    Editar cliente</h1>

<form class="max-w-sm mx-auto" id="cliente-form" action="/actualizar/{{$cliente->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-5">
        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
        <input type="text" id="nombre" name="nombre"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Edita tu nombre" required minlength="2" maxlength="50" value="{{ $cliente->nombre }}">
        <p id="nombre-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> El nombre debe tener entre 2 y 50 caracteres.</p>
        <p id="nombre-success" class="hidden mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Correcto!</span> Nombre válido.</p>
    </div>

    <div class="mb-5">
        <label for="apellido-paterno" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Paterno</label>
        <input type="text" id="apellido-paterno" name="apellidoP"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Edita tu apellido paterno" required minlength="2" maxlength="50" value="{{ $cliente->apellidoP }}">
        <p id="apellido-paterno-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> El apellido paterno debe tener entre 2 y 50 caracteres.</p>
    </div>

    <div class="mb-5">
        <label for="apellido-materno" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Materno</label>
        <input type="text" id="apellido-materno" name="apellidoM"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Edita tu apellido materno" required minlength="2" maxlength="50" value="{{ $cliente->apellidoM }}">
        <p id="apellido-materno-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> El apellido materno debe tener entre 2 y 50 caracteres.</p>
    </div>

    <div class="mb-5">
        <label for="correo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Correo</label>
        <input type="email" id="correo" name="correo"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Edita tu correo" minlength="8" maxlength="50" required value="{{ $cliente->email }}">
        <p id="correo-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> El usuario debe tener mínimo 8 caracteres.</p>
    </div>

    <div class="mb-5">
        <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Escribe tu nueva contraseña (8 caracteres mínimo)" minlength="8" maxlength="256">
        <p id="contraseña-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> La contraseña debe tener mínimo 8 caracteres.</p>
    </div>

    <div class="mb-5">
        <label for="imagen" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Subir Imagen</label>
        <input type="file" accept="image/*" id="imagen" name="imagen"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
        @if($cliente->imagen)
            <img src="{{ asset($cliente->imagen) }}" alt="Imagen del cliente" class="mt-3">
        @endif
    </div>

    {{-- <div class="mb-5">
        <label for="estado" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
        <select id="estado" name="estado"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required>
            <option value="" {{ $cliente->estado == '' ? 'selected' : '' }}>Activo o Inactivo</option>
            <option value="1" {{ $cliente->estado == '1' ? 'selected' : '' }}>Activo</option>
            <option value="2" {{ $cliente->estado == '2' ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div> --}}

    <div class="mb-5">
        <label for="direccion" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Dirección</label>
        <input type="text" id="direccion" name="direccion"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Edita tu dirección" required minlength="2" maxlength="255" value="{{ $cliente->direccion }}">
        <p id="direccion-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> La dirección debe tener entre 2 y 255 caracteres.</p>
    </div>

    <div class="mb-5">
        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
        <input type="number" id="telefono" min="0" name="telefono"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Edita tu número" required value="{{ $cliente->telefono }}">
        <p id="telefono-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-500">El teléfono debe tener 10 dígitos.</p>
    </div>

    <div class="mb-5">
        <button type="submit"
            class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Actualizar Cliente
        </button>
    </div>
</form>

@endsection