<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de compras') }}
        </h2>
        <style>
            .notificacion {
                background-color: #ddd;
                border: 1px solid #ddd;
                border-radius: 20px;
                padding: 20px;
                margin: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .card-img-top {
                width: 80px;
                border-radius: 10px;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  p-10">
                @if ( $compras->isEmpty())
                <h2 class="h3 m-2">No has realizado alguna compra aún!</h2>
                <img style="width: 150px;" src="https://previews.123rf.com/images/alekseyvanin/alekseyvanin1710/alekseyvanin171000985/88110651-icono-de-la-l%C3%ADnea-de-la-correa-del-motor-del-autom%C3%B3vil-muestra-del-vector-del-esquema-pictograma.jpg" alt="Imagen de correa">
                <a href="/productocliente" class="btn btn-warning m-2">Ir a Productos</a>
                @endif

                @foreach($compras as $compra)
                @if($compra->id_producto)
                <div class="notificacion">
                    @if ($compra->producto->imagen)
                    <img class="card-img-top" src="{{asset($compra->producto->imagen)}}" alt="{{$compra->producto->nombre}}">
                    @else
                    <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
                    @endif
                    <h3 class="h3 max-w-md">{{$compra->producto->nombre}}</h3>
                    <span>{{$compra->producto->precio}} $</span>
                    <span>{{$compra->fecha}}</span>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
