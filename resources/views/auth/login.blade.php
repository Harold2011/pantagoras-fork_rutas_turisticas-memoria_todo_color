<x-guest-layout>
    <div class="flex h-screen">
        <!-- Contenedor izquierdo con el botón de registro -->
        <div class="hidden lg:flex items-center justify-center bg-[#120A33] text-white w-1/2">
            <div class="p-8">
                <h2 class="text-4xl font-bold mb-4">¡Únete a nosotros!</h2>
                <p class="text-lg mb-8">Regístrate para obtener una cuenta y acceder.</p>
                <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold text-lg hover:bg-indigo-700 hover:text-white transition duration-300">Registrarse</a>
            </div>
        </div>

        <!-- Contenedor derecho con el formulario de inicio de sesión -->
        <div class="w-full lg:w-1/2 bg-gray-100 flex items-center justify-center">
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
