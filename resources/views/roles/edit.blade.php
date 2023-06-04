<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>



    <div class="py-12">
        @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Editar un Rol</h1>

                {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol', 'required' => 'required']) !!}

                    @error('name')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <h2>Lista de permisos</h2>
                @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{$permission->description;}}
                    </label>
                </div>
                @endforeach

                {!! Form::submit('Crear rol', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>