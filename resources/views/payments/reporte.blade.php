<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
            <h2 class="section-title h2">Reporte de ventas</h2>
            @if ($ventas->isEmpty())
            <h3 class="h3">Fecha {{$fecha}}</h3>
            <div>
                <h2 class="h3 m-2">No hay ventas registradas para esta fecha ...</h2>
                <img style="width: 150px;" src="https://previews.123rf.com/images/alekseyvanin/alekseyvanin1710/alekseyvanin171000985/88110651-icono-de-la-l%C3%ADnea-de-la-correa-del-motor-del-autom%C3%B3vil-muestra-del-vector-del-esquema-pictograma.jpg" alt="Imagen de correa">
            </div>
            @else
            <h3 class="h3">Fecha {{$fecha}}</h3>

            <table id="tabla" class="table table-light table-striped table-bordered shadow-lg mt" style="width: 100%;">
                <thead style="background-color:#6777ef">
                    <th>ID Pago</th>
                    <th>Nombre Comprador</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Método Pago</th>
                    <th>Referencia</th>
                    <th>Pago Verificado</th>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        @if($venta->comprador)
                        <td>{{ $venta->comprador}},
                            <p>{{$venta->compradorCedula}}</p>
                        </td>
                        <td style="word-break: break-all;">{{ $venta->compradorEmail}}</td>
                        <td>{{ $venta->compradorTelefono}}</td>
                        @else
                        <td>-</td>
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
                            {{$venta->verificado}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>