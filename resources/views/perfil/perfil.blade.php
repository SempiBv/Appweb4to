@extends('/plantilla/layout')

@section('titulo', 'PERFIL')

@section('contenido')
    <div class="flex justify-center items-start h-screen mt-10">
        <!-- Cambiado de items-center a items-start y añadido mt-10 para margen superior -->
        <div
            class="w-full max-w-xl max-h-3xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-8">
            <div class="content-center">
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset($cliente->imagen)}}" alt=" {{$cliente->imagen}}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$cliente->nombre. ' ' . $cliente->apellidoP}}</h5>


                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        
                        <div>
                            <label for="Nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre(s)</label>
                            <input type="text" id="Nombre" name="Nombre" value="{{$cliente->nombre}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" disabled />
                        </div>
                        <div>
                            <label for="Apellido Paterno"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                                Paterno</label>
                            <input type="text" id="apellidoP" name="apellidoP" value="{{$cliente->apellidoP}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Doe" disabled />
                        </div>
                        <div>
                            <label for="Apellido Materno"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                                Materno</label>
                            <input type="text" id="apeliidoM" name="apellidoM" value="{{$cliente->apellidoM}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Flowbite" disabled />
                        </div>
                        <div>
                            <label for="correo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                            <input type="email" id="correo" value="{{$cliente->email}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john.doe@company.com" disabled />
                        </div>
                        <div>
                            <label for="direccion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
                            <input type="text" id="direccion" name="direccion" value="{{$cliente->direccion}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Flowbite" disabled />
                        </div>
                        <div>
                            <label for="telefono"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                            <input type="text" id="telefono" name="telefono" value="{{$cliente->telefono}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Flowbite" disabled />
                        </div>
                        {{-- {{$cliente -> id}} --}}
                        <a href="/editar/{{$cliente->id}}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Editar Cuenta
                        </a>
                        
                        <a href="/mostrar/{{$cliente->id}}"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            Eliminar Cuenta
                        </a>

                        

                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection
