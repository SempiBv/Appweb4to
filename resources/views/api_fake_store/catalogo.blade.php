@extends('/plantilla/layout')

@section('titulo', 'CATALOGO FAKE')

@section('contenido')
    <H1>PEDIDOS CLIENTE</H1>

    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-manrope font-bold text-4xl text-black mb-8 max-lg:text-center">
                Product list
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($productos as $prod)
                    <a href="/apifake/{{$prod->id}}/detalles"
                    class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                    <div class="h-64 w-full flex justify-center items-center">
                        <img src="{{$prod->image}}" alt="{{$prod->title}} image"
                            class="h-full w-full object-contain rounded-2xl">
                    </div>
                    <div class="mt-5">
                        <div class="flex items-center justify-between">
                            <h6
                                class="font-semibold text-xl leading-8 text-black transition-all duration-500 group-hover:text-indigo-600">
                                {{$prod->title}}</h6>
                            <h6 class="font-semibold text-xl leading-8 text-indigo-600">${{$prod->price}}</h6>
                        </div>
                        <p class="mt-2 font-normal text-sm leading-6 text-gray-500">{{$prod->category}}</p>
                    </div>
                </a> 
                @endforeach
            </div>
        </div>
    </section>
@endsection