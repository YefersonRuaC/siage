<x-guest-layout>
    <x-auth>
        <div class="mb-4 text-gray-600">
            {{ __('Puedes establecer una nueva contraseña para tu cuenta, ingresa el correo electronico asociado
            a tu cuenta y te enviaremos un enlace') }}
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('password.email') }}" novalidate>
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo electronico')" class="mt-3 text-lg ml-1"/>
                <x-text-input 
                    id="email" 
                    class="block mt-1 w-full" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required autofocus 
                    placeholder="Ingresa tu correo electronico"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex flex-col items-center mt-6">
                <x-primary-button class="bg-lime-600 hover:bg-lime-700 text-lg 
                                focus:bg-lime-700 active:bg-lime-900 focus:ring-lime-500">
                    {{ __('Enviar enlace') }}
                </x-primary-button>

                <div class="mt-4 mb-3">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" 
                            class="underline text-lg text-blue-700 hover:text-blue-900 rounded-md">
                            {{ __('¿Ya tienes una cuenta? Inicia sesion') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </x-auth>
</x-guest-layout>
