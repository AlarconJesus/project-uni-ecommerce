<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Editar Categoría</h1>

                <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value={{$categoria->nombre}}>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="color" name="color" class="form-control" value={{$categoria->color}}>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>