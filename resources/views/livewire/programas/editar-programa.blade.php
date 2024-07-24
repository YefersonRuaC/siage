<div class="bg-gray-50 rounded-md shadow-md px-8 py-5">
    <h1 class="font-bold text-center text-2xl text-gray-900">Editar Programa de formación</h1>
    
    <div class="border-b border-gray-300 my-5"></div>

    <form class="" wire:submit.prevent='editarPrograma'>
        {{--Codigo--}}
        <div>
            <x-input-label for="codigo" :value="__('Codigo del programa')" class="ml-3"/>
            <x-text-input 
                id="codigo" 
                class="block mt-1 w-full"
                type="text"
                wire:model="codigo"
                :value="old('codigo')"
                placeholder="Ingresé el codigo del programa de formación"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('codigo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Nombre corto--}}
        <div>
            <x-input-label for="nombre_corto" :value="__('Nombre corto')" class="ml-3"/>
            <x-text-input 
                id="nombre_corto" 
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre_corto"
                :value="old('nombre_corto')"
                placeholder="Ingresé las siglas del programa de formación"
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

        {{--Trimestres--}}
        <div>
            <x-input-label for="trimestres" :value="__('Cantidad de trimestres')" class="ml-3 mt-1"/>
            <x-text-input 
                id="trimestres" 
                class="block mt-1 w-full"
                type="number"
                wire:model="trimestres"
                :value="old('trimestres')"
                placeholder="Ingresé la cantidad total de trimestres del programa de formación"
            />

            @error('trimestres')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
        
        <div class="border-b border-gray-300 mt-5"></div>

        <x-primary-button class="w-full shadow-md mt-5 bg-gray-800 hover:bg-gray-700">
            Editar Programa
        </x-primary-button>
    </form>
</div>