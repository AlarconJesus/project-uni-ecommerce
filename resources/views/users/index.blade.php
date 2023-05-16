<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
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
                <h2 class="section-title">Bienvenido a la sección de Usuarios</h2>
                <!-- <a href="users/create" class="btn btn-info add-button">Crear un nuevo Usuario</a> -->

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th style="display: none;">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="display: none;">{{ $user->id }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                @can('users.edit')
                                <a class="btn btn-info" href="{{ route('users.edit',$user->id) }}">Editar</a>
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