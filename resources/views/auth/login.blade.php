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

        function login() {
            if (captcha) {
                document.getElementById('form_login').submit();
            }
        }

        // function login() {
        //     document.getElementById('form_login').submit();
        // }
    </script>

    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
            <img src="https://i.ibb.co/3h5Qrbj/logoproinfalca.png" alt="logoproinfalca" style="max-width: 120px" border="0">

        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form id="form_login" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" maxlength="255" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4 mb-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" maxlength="30" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Captcha -->
            <!-- <div class="g-recaptcha" data-sitekey="6LdxfZ4mAAAAAEIuM66D62h4p0CfUfSTbHAQcuh2"></div> -->
            <div id="grecaptcha-container"></div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña?') }}
                </a>
                @endif

                <button type="button" onclick="login()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4" class="ml-4">
                    {{ __('Ingresar') }}
                </button>
            </div>
        </form>
    </x-authentication-card>

    <!-- @push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush -->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
</x-guest-layout>