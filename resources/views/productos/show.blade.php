<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del producto') }}
        </h2>
        <style>
            .section-title {
                font-weight: bold;
                font-size: 30px;
                margin: 30px;
            }

            .detalles-main {
                width: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: space-between;
            }

            .card-img-top {
                max-width: 400px;
            }

            .card-stock {
                font-style: italic;
                opacity: 0.8;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="section-title">Detalles del Producto</h2>

                <div class="detalles-main">
                    @if ($producto->imagen)
                    <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}">
                    @else
                    <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title h2">{{$producto->nombre}}</h5>
                        @if($producto->stock > 0)
                        <h5 class="card-stock mt-2">Disponible.</h5>
                        @else
                        <h5 class="card-stock mt-2 text-danger">Agotado temporalmente...</h5>
                        @endif

                        <p class="card-text card-descripcion mt-4 mb-4">{{$producto->descripcion}}</p>

                        <p class="card-text h3">{{$producto->precio}} $</p>
                        @if($producto->stock > 0)
                        <a href="/contactanos/{{$producto->id}}" class="btn btn-primary my-8">Confirmar Comprar</a>
                        @else
                        <a href="/productocliente" class="btn btn-warning my-8">Ir a productos</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
