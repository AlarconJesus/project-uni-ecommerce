<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar cambio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h2 class="h2">Editar cambio</h2>

                <form action="{{ route('dolar.update', $dolar) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precio">Precio *</label>
                                <input type="number" step="0.01" min="0" name="precio" class="form-control" required value="{{$dolar->precio}}">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha y Hora *</label>
                                <input type="datetime-local" name="fecha" class="form-control" required value="{{$dolar->fecha}}">
                            </div>
                        </div>
                        <div style="display: flex;  justify-content: center;">
                            <button type="submit" class="bg-blue-500 btn btn-primary mt-10">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
