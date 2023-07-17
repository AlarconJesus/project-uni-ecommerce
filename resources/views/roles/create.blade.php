<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h2 class="h2">Crear un Rol</h2>

                {!! Form::open(['route' => 'roles.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control mb-3', 'placeholder' => 'Ingrese el nombre del rol', 'required' => 'required', 'maxlength' => '30']) !!}

                    @error('name')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <h2 class="mb-2">Lista de permisos</h2>
                @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{$permission->description;}}
                    </label>
                </div>
                @endforeach

                <div style="display: flex;  justify-content: center;">
                    {!! Form::submit('Crear rol', ['class' => 'bg-blue-500 btn btn-primary mt-10']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>