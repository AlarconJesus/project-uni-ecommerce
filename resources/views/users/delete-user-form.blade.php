<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eliminar cuenta') }}
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
                <h2 class="h2">Eliminar cuenta permanentemente</h2>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <p class="h5">Email</p>
                            <p class="form-control">{{$user->email}}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <label for="password" style="color: red;">Ingresa tu Contraseña como Administrador para eliminar</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    @if($user->hasRole('Admin'))
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mb-2">
                        <div class="form-group">
                            <label for="passworda" style="color: red;">Estas a punto de eliminar a un Administrador, ingresa la clave del Administrador principal para continuar. </label>
                            <input type="password" name="passworda" class="form-control" required>
                        </div>
                    </div>
                    @endif

                    <div style="display: flex;  justify-content: center;">
                        <button type="submit" class="bg-red-500 btn btn-danger mt-2">Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
