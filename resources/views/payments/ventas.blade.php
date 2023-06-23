<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de ventas') }}
        </h2>
        <style>
            .notificacion {
                background-color: #ddd;
                border: 1px solid #ddd;
                border-radius: 20px;
                padding: 10px;
                margin: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .card-img-top {
                width: 50px;
                border-radius: 10px;
                margin-right: 15px;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h2 class="section-title h2">Historial de ventas</h2>
                <!-- protected $fillable = ['nombre', 'fecha', 'moneda', 'metodo_pago', 'monto', 'IVA', 'referencia', 'comentario', 'id_user', 'id_producto'];
        protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'imagen', 'id_categoria']; -->
                @if ( $ventas->isEmpty())
                <div>
                    <h2 class="h3 m-2">No hay ventas realizadas aún!</h2>
                    <img style="width: 150px;" src="https://previews.123rf.com/images/alekseyvanin/alekseyvanin1710/alekseyvanin171000985/88110651-icono-de-la-l%C3%ADnea-de-la-correa-del-motor-del-autom%C3%B3vil-muestra-del-vector-del-esquema-pictograma.jpg" alt="Imagen de correa">
                </div>
                @else

                <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                    <thead style="background-color:#6777ef">
                        <th>ID Pago</th>
                        <th>Nombre Comprador</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Método Pago</th>
                        <th>Referencia</th>
                        <th>Pago Verificado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            @if($venta->comprador)
                            <td>{{ $venta->comprador}}</td>
                            <td>{{ $venta->compradorEmail}}</td>
                            @else
                            <td>-</td>
                            <td>-</td>
                            @endif

                            <td>{{ $venta->fecha}}</td>
                            @if($venta->producto)
                            <td><a href="/productos/{{$venta->producto->id}}">{{ $venta->producto->nombre}}</a></td>
                            <td>{{ $venta->producto->precio}}</td>
                            @else
                            <td>-</td>
                            <td>-</td>
                            @endif
                            <td>{{ $venta->metodo_pago}}, {{ $venta->moneda}}</td>
                            @if($venta->referencia)
                            <td>{{$venta->referencia}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>
                                @if(! $venta->verificado)
                                <p>Sin verificar ❌</p>
                                @else
                                <p>Verificado ✅</p>
                                @endif
                            </td>
                            <td>
                                <a href="/ventas/detalle/{{$venta->id}}" class="btn btn-primary">Detalle</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>