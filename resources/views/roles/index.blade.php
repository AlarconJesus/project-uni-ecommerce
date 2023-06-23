<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
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
        @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  p-10">

                <h2 class="section-title">Bienvenido a la sección de Roles</h2>
                @can('roles.create')
                <a href="roles/create" class="bg-blue-500 btn btn-primary add-button">Nuevo Rol</a>
                @endcan

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th>ID</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name}}</td>
                            <td>
                                @can('roles.edit')
                                <a class="bg-blue-500 btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                @endcan

                                @can('roles.destroy')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Borrar', ['class' => 'bg-red-500 btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>