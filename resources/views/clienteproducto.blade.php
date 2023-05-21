<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
        <style>
            .section-title {
                font-weight: bold;
                font-size: 30px;
                margin: 30px;
            }

            .add-button {
                margin-left: 30px;
                margin-bottom: 30px;
            }

            .card-container {
                display: flex;
                flex-wrap: wrap;
            }

            .card {
                margin: 10px;
            }

            .card-title {
                font-size: 24px;
            }

            .card-text {
                font-size: 22px;
                font-weight: bold;
                color: #212A3E;
            }

            .card-img-top {
                object-fit: contain;
                width: 300px;
                height: 300px;
            }

            .categories-container {
                margin-bottom: 40px;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Categorias  -->
            <div class="categories-container">
                @foreach ($categorias as $categoria)
                <!-- revisar la referencia en el edit de algun index -->
                <!-- <a href="categorias/{{$categoria->id}}" style="background-color: {{$categoria->color}};" class="btn btn-light">{{$categoria->nombre}}</a> -->
                <a href="productocliente?categoria={{$categoria->id}}" style="background-color: {{$categoria->color}};" class="btn btn-light">{{$categoria->nombre}}</a>
                @endforeach
            </div>
            <div>
                <form action="{{route('getProductoCliente')}}" method="get">
                    <div class="btn-group mb-2">
                        <input type="text" name="busqueda" class="form-control">
                        <input type="submit" value="Enviar" class="btn btn-primary" style="color: ##2175fc;">
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg card-container">
                @foreach ($productos as $producto )
                <div class="card" style="width: 18rem;">
                    @if ($producto->imagen)
                    <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}">
                    @else
                    <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$producto->nombre}}</h5>
                        <p class="card-text">{{$producto->precio}} $</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-2">
                {{$productos->appends(['busqueda'=>$busqueda])}}
            </div>
        </div>
    </div>
</x-app-layout>