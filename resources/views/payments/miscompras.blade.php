<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Historial de compras') }}
    </h2>
    <style>
      .notificacion {
        background-color: #ddd;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 20px;
        margin: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .card-img-top {
        width: 80px;
        border-radius: 10px;
      }
    </style>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @foreach($compras as $compra)
        <div class="notificacion">
          @if ($compra->producto->imagen)
          <img class="card-img-top" src="{{asset($compra->producto->imagen)}}" alt="{{$compra->producto->nombre}}">
          @else
          <img class="card-img-top" src="https://www.hardingtraffic.co.nz/uploaded_files/missing_image.png" alt="imagen producto">
          @endif
          <h3 class="h3">{{$compra->producto->nombre}}</h3>
          <span>{{$compra->producto->precio}} $</span>
          <span>{{$compra->fecha}}</span>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>