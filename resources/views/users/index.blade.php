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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  p-10">
                <h2 class="section-title">Bienvenido a la sección de Usuarios</h2>
                <!-- <a href="users/create" class="btn btn-info add-button">Crear un nuevo Usuario</a> -->

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th style="display: none;">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Número de Teléfono</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="display: none;">{{ $user->id }}</td>
                            @if($user->hasRole('Admin'))
                            <td><strong>{{ $user->name}}</strong> <span class="italic text-muted">Admin</span></td>
                            @else
                            <td>{{ $user->name}}</td>
                            @endif

                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telefono }}</td>
                            @if($user->banned_at)
                            <td style="color:red;">Bloqueado</td>
                            @else
                            <td style="color: green;">Activo</td>
                            @endif
                            <td>
                                @can('users.edit')
                                <a class="bg-blue-500 btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                @endcan
                                @can('users.destroy')
                                <a class="bg-red-500 btn btn-danger" href="{{ route('users.eliminarUsuario',$user->id) }}">Eliminar</a>
                                @endcan

                                <a class="bg-yellow-500 btn btn-warning" href="{{ route('users.ban',$user->id) }}">Ban</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>