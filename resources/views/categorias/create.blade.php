<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h2 class="h2">Crear una Categoría</h2>

                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="form-group">
                                <label for="nombre">Nombre *</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="color" name="color" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="bg-blue-500 btn btn-primary mt-10">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>