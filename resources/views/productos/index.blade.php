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
        </style>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  p-3">
                <h2 class="section-title">Bienvenido a la sección de Productos</h2>


                @if ( $productos->isEmpty())
                <div>
                    <h2 class="h3 m-2">No hay productos registrados!</h2>
                    <img style="width: 150px;" src="https://previews.123rf.com/images/alekseyvanin/alekseyvanin1710/alekseyvanin171000985/88110651-icono-de-la-l%C3%ADnea-de-la-correa-del-motor-del-autom%C3%B3vil-muestra-del-vector-del-esquema-pictograma.jpg" alt="Imagen de correa">
                    @can('productos.create')
                    <a href="productos/create" class="bg-blue-500 btn btn-primary add-button">Crear un nuevo Producto</a>
                    @endcan
                </div>
                @else

                @can('productos.create')
                <a href="productos/create" class="bg-blue-500 btn btn-primary add-button">Crear un nuevo Producto</a>
                @endcan

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th style="display: none;">ID</th>
                        <th style="max-width: 300px;">Nombre</th>
                        <th style="max-width: 300px;">Descripcion</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td style="display: none;">{{ $producto->id }}</td>
                            <td>{{ $producto->nombre}}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->precio }}</td>
                            @if($producto->categorias)
                            <td>{{ $producto->categorias->nombre }}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>
                                @if ($producto->imagen)
                                <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}" style="width: 60px;">
                                @else
                                <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto" style="width: 60px;">
                                @endif
                            </td>
                            <td>
                                @can('productos.edit')
                                <a class="bg-blue-500 btn btn-primary" href="{{ route('productos.edit',$producto->id) }}">Editar</a>
                                @endcan

                                @can('productos.destroy')
                                {!! Form::open(['method' => 'DELETE','route' => ['productos.destroy', $producto->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Borrar', ['class' => 'bg-red-500 btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>