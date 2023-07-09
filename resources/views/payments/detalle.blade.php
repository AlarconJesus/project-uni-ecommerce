<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Pago') }}
        </h2>
        <style>
            .section-title {
                font-weight: bold;
                font-size: 30px;
                margin: 30px;
            }

            .detalles-main {
                width: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .card-img-top {
                max-width: 200px;
            }
        </style>
    </x-slot>

    <div class="py-12">
        @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="h2">Detalles de Pago</h2>

                <div class="detalles-main">
                    @if ($producto->imagen)
                    <img class="card-img-top" src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}">
                    @else
                    <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title h2">{{$producto->nombre}}</h5>
                        <p class="card-text card-descripcion mt-4 mb-4">{{$producto->descripcion}}</p>
                        <p class="card-text h3">{{$producto->precio}} $</p>
                    </div>

                </div>

                <!-- nombre', 'fecha', 'moneda', 'metodo_pago', 'monto', 'IVA', 'referencia', 'comentario' -->

                <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre de la persona que emitió el pago: *</label>
                                <input type="text" maxlength="60" name="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha *</label>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>
                        </div>

                        <input type="hidden" name="id_user" value="{{$userId}}">
                        <input type="hidden" name="IVA" value="16">
                        <input type="hidden" name="id_producto" value="{{$producto->id}}">

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="monto">Moneda *</label>
                                <select name="moneda" id="" required style="width: 100%;">
                                    <option value="bolivares">
                                        <label class="form-check-label" for="bolivares">
                                            Bolívares
                                        </label>
                                    </option>
                                    <option value="dolares">
                                        <label class="form-check-label" for="dolares">
                                            Dolares
                                        </label>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="metodo_pago">Método de pago *</label>
                                <select name="metodo_pago" id="" required style="width: 100%;">
                                    <option value="pagomovil">
                                        <label class="form-check-label" for="pagomovil">
                                            Pago movil
                                        </label>
                                    </option>
                                    <option value="transferencia">
                                        <label class="form-check-label" for="transferencia">
                                            Transferencia
                                        </label>
                                    </option>
                                    <option value="efectivo">
                                        <label class="form-check-label" for="efectivo">
                                            Efectivo
                                        </label>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input type="number" required step="any" name="monto" class="form-control disabled" readonly value="{{$producto->precio * $dolarActual->precio}}">
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="">Tasa del día</label>
                                <input type="number" name="tasa" class="form-control disabled" readonly required value="{{$dolarActual->precio}}">
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="referencia">Número de comprobante *</label>
                                <input type="number" maxlength="60" step="any" name="referencia" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="comentario">Comentario</label>
                                <input type="text" name="comentario" maxlength="30" class="form-control" required>
                            </div>
                        </div>

                        <div style="display: flex;  justify-content: center;">
                            <button type="submit" class="bg-green-500 btn btn-success mt-10" style="width: 80px;" class="button-guardar">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
