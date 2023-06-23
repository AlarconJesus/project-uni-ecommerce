<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <h2 class="h2">Crear un producto</h2>

                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="stock">Cantidad en almacen</label>
                                <input type="number" name="stock" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" step="any" name="precio" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            @if(sizeof($categorias) == 0)
                            <label for="id_categoria">Categoría</label>
                            <h3>No hay categorias registradas, crea una primero. </h3>
                            <a href="/categorias" class="btn btn-warning">Ir a Categorías</a>
                            @else
                            <div class="form-group">
                                <label for="id_categoria">Categoría</label>
                                <div class="form-check">
                                    <select name="id_categoria" id="" required>
                                        @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">
                                            <label class="form-check-label" for="{{$categoria->id}}">
                                                {{$categoria->nombre}}
                                            </label>
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <button type="submit" class="bg-blue-500 btn btn-primary mt-2">Guardar</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>