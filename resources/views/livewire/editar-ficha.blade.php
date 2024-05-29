<div class="bg-gray-50 rounded-md shadow-md px-8 py-5">
    <h1 class="font-bold text-center text-2xl text-gray-900">Editar ficha en formación</h1>
    
    <div class="border-b border-gray-300 my-5"></div>

    <form class="" wire:submit.prevent='editarFicha'>
        {{--Ficha--}}
        <div>
            <x-input-label for="ficha" :value="__('Número de ficha')" class="ml-3"/>
            <x-text-input 
                id="ficha" 
                class="block mt-1 w-full"
                type="number"
                wire:model="ficha"
                :value="old('ficha')"
                placeholder="Ingresé el número de la ficha"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('ficha')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

       {{-- Programas select --}}
        <div class="mt-1">
            <x-input-label for="programa" :value="__('Programa de formación')" class="ml-3"/>
            <select 
                wire:model="programa" 
                id="programa" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
                <option value="" selected disabled>--Seleccione--</option>
                @foreach ($programas as $programa)
                    <option value="{{ $programa->nombre_corto }} - {{ $programa->nombre_completo }}">
                        {{ $programa->nombre_corto }} - {{ $programa->nombre_completo }}
                    </option>
                @endforeach
            </select>

            @error('programa')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>


        {{--Jornada--}}
        <div class="mt-1">
            <x-input-label for="jornada" :value="__('Jornada de formación')" class="ml-3"/>
            <select 
                wire:model="jornada" 
                id="jornada" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            <option value="mañana">Mañana</option>
            <option value="tarde">Tarde</option>
            <option value="noche">Noche</option>
            </select>

            @error('jornada')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Trimestre--}}
        <div class="mt-1">
            <x-input-label for="trimestre" :value="__('Trimestre actual')" class="ml-3"/>
            <select 
                wire:model="trimestre" 
                id="trimestre" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            </select>

            @error('trimestre')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
        
        <div class="border-b border-gray-300 mt-5"></div>

        <x-primary-button class="w-full shadow-md mt-5">
            Editar ficha
        </x-primary-button>
    </form>
</div>