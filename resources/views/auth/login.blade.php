<x-guest-layout>
    <x-auth>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
    
            <!-- Email Address -->
            {{-- <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div> --}}
    
            <!-- Email Address -->
            <div>
                <x-input-label for="id" :value="__('Documento')" class="mt-3 text-lg ml-1"/>
                <x-text-input 
                    id="id" 
                    class="block mt-1 w-full" 
                    type="number" 
                    name="id" 
                    :value="old('id')" 
                    required autofocus 
                    autocomplete="username" 
                    placeholder="Numero de documento"
                />
                <x-input-error :messages="$errors->get('id')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" class="mt-3 text-lg ml-1"/>
                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" 
                    placeholder="Ingrese su contraseña"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="border-b border-gray-300 mt-5 mb-5 mx-1"></div>
    
            <div class="flex flex-col items-center mt-4">
                <x-primary-button class="bg-blue-700 hover:bg-blue-800 text-lg
                                focus:bg-blue-700 active:bg-blue-900 focus:ring-blue-500 ">
                    {{ __('Iniciar sesion') }}
                </x-primary-button>
                
                <div class="mt-4 mb-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                            class="underline text-lg text-lime-700 hover:text-lime-900 rounded-md">
                            {{ __('Restablecer contraseña') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </x-auth>
</x-guest-layout>