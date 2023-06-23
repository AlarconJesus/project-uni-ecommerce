<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  p-10">
                <h2 class="section-title">Bienvenido a la sección de Categorías</h2>

                @if ( $categorias->isEmpty())
                <div>
                    <h2 class="h3 m-2">No hay categorías registradas!</h2>
                    <img style="width: 150px;" src="https://previews.123rf.com/images/alekseyvanin/alekseyvanin1710/alekseyvanin171000985/88110651-icono-de-la-l%C3%ADnea-de-la-correa-del-motor-del-autom%C3%B3vil-muestra-del-vector-del-esquema-pictograma.jpg" alt="Imagen de correa">
                    @can('categorias.create')
                    <a href="categorias/create" class="btn btn-warning add-button">Crear una nueva Categoría</a>
                    @endcan
                </div>
                @else

                @can('categorias.create')
                <a href="categorias/create" class="bg-blue-500 btn btn-primary add-button">Crear una nueva Categoría</a>
                @endcan

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th style="display: none;">ID</th>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td style="display: none;">{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre}}</td>
                            <td style="background-color: {{ $categoria->color }};">{{ $categoria->color }}</td>
                            <td>
                                @can('categorias.edit')
                                <a class="bg-blue-500 btn btn-primary" href="{{ route('categorias.edit',$categoria->id) }}">Editar</a>
                                @endcan

                                @can('categorias.destroy')
                                {!! Form::open(['method' => 'DELETE','route' => ['categorias.destroy', $categoria->id],'style'=>'display:inline']) !!}
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