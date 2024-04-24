<x-guest-layout>
    <x-auth>
        <form method="POST" action="{{ route('password.store') }}" novalidate>
            @csrf
    
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo electronico')" class="ml-1"/>
                <x-text-input 
                    id="email" 
                    class="block mt-1 w-full" 
                    type="email" 
                    name="email" 
                    :value="old('email', $request->email)" 
                    required autofocus 
                    autocomplete="username" 
                    placeholder="Correo electronico"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Nueva contraseña')" class="ml-1"/>
                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full" 
                    type="password" 
                    name="password" 
                    required autocomplete="new-password" 
                    placeholder="Contraseña"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirma tu contraseña')" class="ml-1"/>
                <x-text-input 
                    id="password_confirmation" 
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" 
                    required autocomplete="new-password" 
                    placeholder="Confirma tu contraseña"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-lime-700 hover:bg-lime-800 text-lg
                                    focus:bg-lime-700 active:bg-lime-900 focus:ring-lime-500 ">
                    {{ __('Restablecer contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth>
</x-guest-layout>
