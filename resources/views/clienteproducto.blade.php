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

            /* .card-container {
                display: flex;
                flex-wrap: wrap;
            } */

            /* .card {
                margin: 10px;
            } */

            .card-container {
                padding: 20px;
                display: grid;
                grid-template-columns: repeat(auto-fill, 17rem);
                justify-content: space-between;
                grid-gap: 10px;
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

            @media screen and (max-width: 576px) {
                .card-container {
                    justify-content: center;
                }
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Categorias  -->
            <div class="categories-container">
                @foreach ($categorias as $categoria)
                <a href="productocliente?categoria={{$categoria->id}}" style="background-color: {{$categoria->color}};" class="btn btn-light">{{$categoria->nombre}}</a>
                @endforeach
            </div>
            <div>
                <!-- volver a colocar como route llamando al name -->
                <form action="productocliente" method="get">
                    <div class="btn-group mb-2">
                        <input type="hidden" name="categoria" value="{{session('categoria')}}">
                        <input type="text" name="busqueda" class="form-control">
                        <input type="submit" value="Enviar" class="bg-blue-500 btn btn-primary">
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg card-container p-2">
                @if ( $productos->isEmpty())
                <div>
                    <h2 class="h3 m-2">No hemos obtenido productos!</h2>
                    <img style="width: 150px;" src="https://previews.123rf.com/images/alekseyvanin/alekseyvanin1710/alekseyvanin171000985/88110651-icono-de-la-l%C3%ADnea-de-la-correa-del-motor-del-autom%C3%B3vil-muestra-del-vector-del-esquema-pictograma.jpg" alt="Imagen de correa">
                    <a href="/productocliente" class="btn btn-warning m-2">Ir a Productos</a>
                </div>
                @endif

                @foreach ($productos as $producto )
                <div class="card" style="width: 17rem;">
                    @if ($producto->imagen)
                    <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}">
                    @else
                    <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$producto->nombre}}</h5>
                        <p class="card-text">{{$producto->precio}} $</p>
                        <a href="/productos/{{$producto->id}}" class="btn btn-primary">Comprar</a>
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