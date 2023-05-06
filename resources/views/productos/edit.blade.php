<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Editar producto</h1>

                <form action="{{ route('productos.update', $producto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" required name="nombre" class="form-control" value={{$producto->nombre}}>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" required name="descripcion" class="form-control" value={{$producto->descripcion}}>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" required step="any" name="precio" class="form-control" value={{$producto->precio}}>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                @if(sizeof($categorias) == 0)
                                <label for="id_categoria">Categoría</label>
                                <h3>No hay categorias registradas, crea una primero. </h3>
                                <a href="/categorias" class="btn btn-warning">Ir a Categorías</a>
                                @else
                                <div class="form-group">
                                    <label for="id_categoria">Categoría</label>
                                    <div class="form-check">
                                        <select name="id_categoria" id="">
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
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>