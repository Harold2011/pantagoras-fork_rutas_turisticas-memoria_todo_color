<x-guest-layout>
    <div class="flex h-screen">
        <!-- Contenedor izquierdo con el formulario de registro -->
        <div class="w-full lg:w-1/2 bg-gray-100 flex items-center justify-center">
            <x-authentication-card>
                <x-slot name="logo">
                    
                </x-slot>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="profile_photo" value="{{ __('Profile Photo') }}" />
                        <x-input id="profile_photo" class="block mt-1 w-full" type="file" name="profile_photo" accept="image/*" />
                    </div>

                    <div class="mt-4">
                        <x-label for="description" value="{{ __('Description') }}" />
                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" autocomplete="description" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="instagram" value="{{ __('Instagram') }}" />
                        <x-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="old('instagram')" autocomplete="instagram" />
                    </div>

                    <div class="mt-4">
                        <x-label for="facebook" value="{{ __('Facebook') }}" />
                        <x-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook')" autocomplete="facebook" />
                    </div>

                    <div class="mt-4">
                        <x-label for="youtube" value="{{ __('YouTube') }}" />
                        <x-input id="youtube" class="block mt-1 w-full" type="text" name="youtube" :value="old('youtube')" autocomplete="youtube" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ms-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>

        <!-- Contenedor derecho con el botón de registro -->
        <div class="hidden lg:flex items-center justify-center bg-[#120A33] text-white w-1/2">
            <div class="p-8">
                <h2 class="text-4xl font-bold mb-4">¡Ya tienes una cuenta!</h2>
                <p class="text-lg mb-8">Regresa al inicio de sesión.</p>
                <a href="{{ route('login') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold text-lg hover:bg-indigo-700 hover:text-white transition duration-300">Iniciar sesión</a>
            </div>
        </div>
    </div>
</x-guest-layout>
        