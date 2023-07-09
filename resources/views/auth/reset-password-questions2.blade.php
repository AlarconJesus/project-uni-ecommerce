<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo />-->
            <img src="https://i.ibb.co/3h5Qrbj/logoproinfalca.png" alt="logoproinfalca" style="max-width: 120px" border="0">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Olvidaste tu contraseña? No hay problema. Solo escribe tu dirección de correo y responde la pregunta secreta para restablecerla.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        @if (session('message'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('message') }}
        </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('psreset3') }}">
            @csrf


            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" readonly class="block mt-1 w-full" type="email" name="email" value="{{$email}}" required />
            </div>
            <div class="block">
                <x-label for="pregunta_secreta" value="{{ __('Pregunta secreta') }}" />
                <x-input id="pregunta_secreta" readonly class="block mt-1 w-full" type="text" name="pregunta_secreta" value="{{$pregunta_secreta}}" required />
            </div>
            <div class="block">
                <x-label for="respuesta_secreta" value="{{ __('Respuesta secreta') }}" />
                <x-input id="respuesta_secreta" class="block mt-1 w-full" type="text" name="respuesta_secreta" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Verificar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
