<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif

        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h2 class="h2">Asignar Rol</h2>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <p class="h5">Nombre</p>
                            <p class="form-control">{{$user->name}}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <p class="h5">Email</p>
                            <p class="form-control">{{$user->email}}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <p class="h5">Teléfono</p>
                            <p class="form-control">{{$user->telefono}}</p>
                        </div>
                    </div>

                    <h2>Listado de Roles</h2>
                    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                    <div class="form-check">
                        @foreach($roles as $role)
                        <div>
                            <label class="form-check-label" for="{{$role->id}}">
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>

                    {!! Form::submit('Asignar rol', ['class' => 'bg-blue-500 btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                    <!-- Esto se realiza asi usando html collective -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>