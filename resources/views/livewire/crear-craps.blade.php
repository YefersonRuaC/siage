<div class="shadow rounded px-3 py-5">
    <h1 class="font-bold text-center text-2xl text-gray-900">Crear competencia</h1>
    
    <div class="border-b border-gray-300 my-2"></div>

    <form wire:submit.prevent='crearCompetencia'>
        {{--competencia--}}
        <div>
            <x-input-label for="competencia" :value="__('Nombre de la competencia')" class="ml-3"/>
            <x-text-input 
                id="competencia" 
                class="block mt-1 w-full"
                type="text"
                wire:model="competencia"
                :value="old('competencia')"
                placeholder="Ingresé el nombre de la competencia"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('competencia')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--raps--}}
        <div class="mt-2">
            <x-input-label for="rap" :value="__('Resultados de aprendizaje')" class="ml-3"/>
            {{-- Recorremos cada elemento del array $raps --}}
            @foreach($raps as $index => $rap)
                <div class="flex items-start mt-2">
                    <textarea 
                        wire:model="raps.{{ $index }}" 
                        id="rap-{{ $index }}" 
                        class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md w-full h-40"
                        placeholder="Ingresé el resultado de aprendizaje asociado a la competencia"
                    ></textarea>
                    <button 
                        type="button" 
                        wire:click="removerRap({{ $index }})" 
                        class="text-red-500 hover:text-red-600 transition"
                    ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                </div>
                {{-- mensaje de error para cada elemento del array segun su indice --}}
                @error('raps.' . $index)
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            @endforeach
            <div class="flex justify-end">
                <button 
                    type="button" 
                    wire:click="agregarRap" 
                    class="mt-2 mr-6 text-blue-400 hover:text-blue-500 transition"
                ><img src="{{ asset('images/plus.webp') }}" alt="plus image" class="h-8 w-auto hover:opacity-90">
                </button>
            </div>
        </div>
        
        <div class="border-b border-gray-300 mt-2"></div>

        <x-primary-button class="w-full shadow-md mt-3 bg-green-600 hover:bg-green-700">
            Crear competencia
        </x-primary-button>
    </form>
</div>