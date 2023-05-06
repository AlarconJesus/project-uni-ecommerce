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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="section-title">Bienvenido a la sección de Productos</h2>
                <a href="productos/create" class="btn btn-info add-button">Crear un nuevo Producto</a>

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th style="display: none;">ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
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
                                <a class="btn btn-info" href="{{ route('productos.edit',$producto->id) }}">Editar</a>

                                {!! Form::open(['method' => 'DELETE','route' => ['productos.destroy', $producto->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>