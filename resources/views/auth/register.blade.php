<x-guest-layout>
    <script>
        let captcha = false;

        var verifyCallback = function(response) {
            captcha = response;
        };

        var onloadCallback = function() {
            grecaptcha.render('grecaptcha-container', {
                'sitekey': '6LdxfZ4mAAAAAEIuM66D62h4p0CfUfSTbHAQcuh2',
                'callback': verifyCallback
            });
        };

        function register() {
            if (captcha) {
                document.getElementById('registerForm').submit();
            }
        }
    </script>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
            <img src="https://i.ibb.co/3h5Qrbj/logoproinfalca.png" alt="logoproinfalca" style="max-width: 120px" border="0">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div class="mt-4 mb-4">
                <x-label for="email" value="{{ __('Correo *') }}" />
                <x-input id="email" maxlength="255" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 p-2">
                    <x-label for="name" value="{{ __('Nombre *') }}" />
                    <x-input id="name" maxlength="60" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <div class="w-1/2 p-2">
                    <x-label for="telefono" value="{{ __('Teléfono *') }}" />
                    <x-input id="telefono" maxlength="12" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                </div>
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 p-2">
                    <x-label for="pregunta_secreta" value="{{ __('Pregunta secreta *') }}" />
                    <x-input id="pregunta_secreta" maxlength="30" class="block mt-1" type="text" name="pregunta_secreta" :value="old('pregunta_secreta')" required autofocus autocomplete="pregunta_secreta" />
                </div>
                <div class="w-1/2 p-2">
                    <x-label for="respuesta_secreta" value="{{ __('Respuesta secreta *') }}" />
                    <x-input id="respuesta_secreta" maxlength="30" class="block mt-1" type="text" name="respuesta_secreta" :value="old('respuesta_secreta')" required autofocus autocomplete="pregunta_secreta" />
                </div>
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 p-2">
                    <x-label for="password" value="{{ __('Contraseña *') }}" />
                    <x-input id="password" maxlength="30" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="w-1/2 p-2">
                    <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña *') }}" />
                    <x-input id="password_confirmation" maxlength="30" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>



            <!-- Captcha -->
            <!-- <div class="g-recaptcha" data-sitekey="6LdxfZ4mAAAAAEIuM66D62h4p0CfUfSTbHAQcuh2"></div> -->
            <div id="grecaptcha-container"></div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Ya te encuentras registrado?') }}
                </a>

                <button type="button" onclick="register()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4" class="ml-4">
                    {{ __('Registrar') }}
                </button>
            </div>
        </form>
    </x-authentication-card>

    @push('scripts')
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    <!-- <script>
        grecaptcha.ready(function() {
            document.getElementById('registerForm').addEventListener("submit", function(event) {
                event.preventDefault();
                grecaptcha.execute('{{ config('
                        services.recaptcha.site_key ') }}', {
                            action: 'register'
                        })
                    .then(function(token) {
                        document.getElementById("recaptcha_token").value = token;
                        document.getElementById('registerForm').submit();
                    });
            });
        });
    </script> -->
    @endpush
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
</x-guest-layout>
