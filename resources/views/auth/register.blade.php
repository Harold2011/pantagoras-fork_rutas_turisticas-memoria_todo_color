<x-guest-layout>
    <div class="flex h-screen">
        <!-- Contenedor izquierdo con el formulario de registro -->
        <div class="w-full lg:w-1/2 bg-gray-100 flex items-center justify-center">
            <x-authentication-card>
                <x-slot name="logo">
                    
                </x-slot>

                <x-validation-errors class="mb-4" />
                <div class="flex justify-center mb-6">
                    <x-authentication-card-logo class="text-white" />
                </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <!-- Campo Nombre -->
                    <div class="col-span-1">
                        <x-label for="name" value="{{ __('Nombre *') }}" />
                        <x-input id="name" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <!-- Campo Email -->
                    <div class="col-span-1">
                        <x-label for="email" value="{{ __('Email *') }}" />
                        <x-input id="email" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="col-span-1">
                        <x-label for="password" value="{{ __('Contraseña *') }}" />
                        <x-input id="password" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Campo Confirmación de Contraseña -->
                    <div class="col-span-1">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña *') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <!-- Campo Foto de Perfil -->
                    <div class="col-span-1">
                        <x-label for="profile_photo" value="{{ __('Foto de perfil') }}" />
                        <x-input id="profile_photo" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="file" name="profile_photo" accept="image/*" />
                    </div>

                    <!-- Campo Descripción -->
                    <div class="col-span-1">
                        <x-label for="description" value="{{ __('Descripcion') }}" />
                        <x-input id="description" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="text" name="description" :value="old('description')" autocomplete="description" />
                    </div>

                    <!-- Campo Instagram -->
                    <div class="col-span-1">
                        <x-label for="instagram" value="{{ __('Instagram') }}" />
                        <x-input id="instagram" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="text" name="instagram" :value="old('instagram')" autocomplete="instagram" />
                    </div>

                    <!-- Campo Facebook -->
                    <div class="col-span-1">
                        <x-label for="facebook" value="{{ __('Facebook') }}" />
                        <x-input id="facebook" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="text" name="facebook" :value="old('facebook')" autocomplete="facebook" />
                    </div>

                    <!-- Campo YouTube -->
                    <div class="col-span-1">
                        <x-label for="youtube" value="{{ __('YouTube') }}" />
                        <x-input id="youtube" class="block mt-1 w-full focus:border-green-500 focus:ring-green-500" type="text" name="youtube" :value="old('youtube')" autocomplete="youtube" />
                    </div>

                    <!-- Términos y Condiciones (opcional) -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="col-span-2">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />
                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <!-- Botón de Registro -->
                    <div class="flex items-center justify-between mt-4 col-span-2">
                        <a class="underline text-sm text-gray-50 hover:text-gray-50 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('login') }}">
                            {{ __('Ya estas registrado?') }}
                        </a>

                        <x-button class="bg-[#078C03] text-white hover:bg-[#34482D]">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>

        <!-- Contenedor derecho con el botón de registro -->
        <div class="hidden lg:flex items-center justify-center bg-[#34482D] text-white w-1/2">
            <div class="p-8">
                <h2 class="text-4xl font-bold mb-4">¡Ya tienes una cuenta!</h2>
                <p class="text-lg mb-8">Regresa al inicio de sesión.</p>
                <a href="{{ route('login') }}" class="bg-[#078C03] text-white px-6 py-3 rounded-full font-semibold text-lg hover:bg-[#34482D] hover:text-white transition duration-300">Iniciar sesión</a>
            </div>
        </div>
    </div>
</x-guest-layout>
