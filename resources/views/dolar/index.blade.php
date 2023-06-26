<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Histórico del dolar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  p-10">
                <h2 class="h2">Bienvenido a la sección de tipo Cambio</h2>

                @if ( $dolarHistorico->isEmpty())
                <div>
                    <h2 class="h3 m-2">No hay histórico del dolar registrado!</h2>
                    <img style="width: 150px;" src="https://cdn-icons-png.flaticon.com/512/2150/2150264.png" alt="dolar">
                    @can('dolar.create')
                    <a href="dolar/create" class="btn btn-warning mb-2">Añadir precio actualizado</a>
                    @endcan
                </div>
                @else

                @can('dolar.create')
                <a href="dolar/create" class="bg-blue-500 btn btn-primary add-button">Añadir precio actualizado</a>
                @endcan

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th style="display: none;">ID</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($dolarHistorico as $dolar)
                        <tr>
                            <td style="display: none;">{{ $dolar->id }}</td>
                            <td>{{ $dolar->precio}} $</td>
                            <td>{{ $dolar->fecha}}</td>
                            <td>
                                @can('dolar.edit')
                                <a class="bg-blue-500 btn btn-primary" href="{{ route('dolar.edit',$dolar->id) }}">Editar</a>
                                @endcan

                                @can('categorias.destroy')
                                {!! Form::open(['method' => 'DELETE','route' => ['dolar.destroy', $dolar->id],'style'=>'display:inline']) !!}
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