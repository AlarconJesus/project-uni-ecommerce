<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pt-10 px-10">
                <h2 class="h2">Editar Categoría</h2>

                <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required class="form-control" value={{$categoria->nombre}}>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="color" name="color" required class="form-control" value={{$categoria->color}}>
                                </div>
                            </div>
                            <!-- boton con tailwind -->
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-4">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>