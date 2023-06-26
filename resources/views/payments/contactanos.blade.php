<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contactanos') }}
        </h2>
        <style>

        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="notificacion">
                    <h2 class="h2">Contacta a nuestro Equipo de Proinfalca!</h2>
                    <p class="green">Haz clic acá 👇</p>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+584121612260&text=Hola!%20estoy%20interesado%20en%20comprar%20una%20correa.%20Necesito%20m%C3%A1s%20informaci%C3%B3n."><img class="card-img-top" src="https://allinsoft.pe/wp-content/uploads/2021/10/g861-589x400.png" alt="WhastApp"></a>
                    <p>Antes de continuar asegúrate de comunicarte con nuestro equipo para garantizar la compra! Gracias!</p>
                </div>

                <a href="/payment/{{$id}}" class="bg-green-500 btn btn-success mt-2">Listo</a>
            </div>
        </div>
    </div>
</x-app-layout>