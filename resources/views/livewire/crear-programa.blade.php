<div class="bg-gray-50 rounded-md shadow-md px-4 md:px-8 py-5">
    <h1 class="font-bold text-center text-2xl text-gray-900">Crear Programa de formación</h1>
    
    <div class="border-b border-gray-300 my-5"></div>

    <form class="" wire:submit.prevent='crearPrograma'>
        {{--Nombre corto--}}
        <div>
            <x-input-label for="nombre_corto" :value="__('Nombre corto')" class="ml-3"/>
            <x-text-input 
                id="nombre_corto" 
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre_corto"
                :value="old('nombre_corto')"
                placeholder="Ingresé las siglas del programa"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('nombre_corto')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Nombre completo--}}
        <div class="mt-1">
            <x-input-label for="nombre_completo" :value="__('Nombre completo del programa')" class="ml-3"/>
            <x-text-input 
                id="nombre_completo" 
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre_completo"
                :value="old('nombre_completo')"
                placeholder="Ingresé el nombre completo del programa de formación"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('nombre_completo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
        
        <div class="border-b border-gray-300 mt-5"></div>

        <x-primary-button class="w-full shadow-md mt-5 bg-gray-800 hover:bg-gray-700">
            Crear Programa
        </x-primary-button>
    </form>
</div>
