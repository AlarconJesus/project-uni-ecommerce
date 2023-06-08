<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Detalles de la Venta') }}
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
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="h2">Detalles de Venta</h2>

        <div class="detalles-main">
          @if ($venta->producto->imagen)
          <img class="card-img-top" src="{{asset($venta->producto->imagen)}}" alt="{{$venta->producto->nombre}}">
          @else
          <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
          @endif
          <div class="card-body">
            <h5 class="card-title h2">{{$venta->producto->nombre}}</h5>
            <p class="card-text card-descripcion mt-4 mb-4">{{$venta->producto->descripcion}}</p>
            <p class="card-text h3">{{$venta->producto->precio}} $</p>
          </div>

        </div>

        <form action="{{ route('payment.update', $venta) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="nombre">Nombre de la persona que emitió el pago: </label>
                <input type="text" name="nombre" class="form-control" required value='{{$venta->comprador}}' disabled>
              </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="nombre">Correo Electrónico: </label>
                <input type="text" name="nombre" class="form-control" required value='{{$venta->compradorEmail}}' disabled>
              </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" class="form-control" required value='{{$venta->fecha}}' disabled>
              </div>
            </div>

            <input type="hidden" name="id_user" value="{{$venta->id_user}}">
            <input type="hidden" name="IVA" value="16">
            <input type="hidden" name="id_producto" value="{{$venta->producto->id}}">

            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="monto">Moneda</label>
                <input type="text" name="moneda" class="form-control" required value='{{$venta->moneda}}' disabled>
              </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="metodo_pago">Método de pago</label>
                <input type="text" name="metodo_pago" class="form-control" required value='{{$venta->metodo_pago}}' disabled />
              </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" required step="any" name="monto" class="form-control" value="{{$venta->producto->precio}}" disabled>
              </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="">Tasa del día</label>
                <input type="number" step="any" name="" class="form-control" required disabled>
              </div>
            </div>


            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="referencia">Número de comprobante</label>
                <input type="number" name="referencia" class="form-control" required value='{{$venta->referencia}}' disabled>
              </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label for="comentario">Comentario</label>
                <input type="text" name="comentario" class="form-control" required value='{{$venta->comentario}}' disabled>
              </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
                <label>Verificado</label>
                @if($venta->verificado)
                <p class="form-control">Pago verificado ✅</p>
                @else
                <p class="form-control">Sin verificar ❌</p>
                @endif
              </div>
            </div>

            <input type="hidden" name="verificado" value="1">

            <button type="submit" class="btn btn-success mt-2">Verificar pago</button>
          </div>
        </form>
      </div>
    </div>
</x-app-layout>