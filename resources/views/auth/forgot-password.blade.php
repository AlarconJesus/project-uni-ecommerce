<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo />-->
            <img src="https://i.ibb.co/3h5Qrbj/logoproinfalca.png" alt="logoproinfalca" style="max-width: 120px" border="0">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Olvidaste tu contraseña? No hay problema. Solo escribe tu dirección de correo y enviaremos un email a tu correo con el link para restablecerla.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enviar el link al correo') }}
                </x-button>
            </div>
        </form>
        <a class="underline mt-10 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/preguntas_secretas">
            {{ __('Validar con Pregunta secreta') }}
        </a>
    </x-authentication-card>
</x-guest-layout>