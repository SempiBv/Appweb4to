<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>CREAR CUENTA</title>
</head>
<body>
    
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Crear cuenta</h1>



    <form class="max-w-sm mx-auto" id="cliente-form" action="/cliente/guardar" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="apellido-paterno" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Paterno</label>
            <input type="text" id="apellido-paterno" name="apellidoP" value="{{ old('apellidoP') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="apellido-materno" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Materno</label>
            <input type="text" id="apellido-materno" name="apellidoM" value="{{ old('apellidoM') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Correo</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" value="{{ old('contraseña') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="imagen" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Subir Imagen</label>
            <input type="file" accept="image/*" id="imagen" name="imagen"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            <div class="mt-2">
                <img id="preview-imagen" class="w-20 h-20 rounded-full" src="" alt="Vista previa de la imagen" style="display:none;">
            </div>
        </div>

        <div class="mb-5">
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
            <input type="number" id="telefono" min="0" name="telefono" value="{{ old('telefono') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Crear Cuenta
            </button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
   
</body>
</html>



    
    
