<div class="px-3 py-4 shadow-sm rounded">
    @if (!$isEditMode)
    <div class="text-center border-b border-green-400 pb-1 mb-1">
        <p class="text-green-600 font-bold">Modo creación</p>
    </div>
    <h2 class="font-bold text-center text-2xl text-green-800 mb-1 pb-1">
        Crear actividad de aprendizaje
    </h2>
    @else
    <div class="text-center border-b border-blue-200 pb-1 mb-1">
        <p class="text-blue-500 font-bold">Modo edición</p>
    </div>
    <h2 class="font-bold text-center text-2xl text-blue-900 mb-1 pb-1">
        Editar actividad de aprendizaje
    </h2>
    @endif

    <form wire:submit.prevent="crearActividad">
        <div>
            <x-input-label for="nombre_corto" :value="__('Nombre corto')" class="ml-3"/>
            <x-text-input 
                id="nombre_corto"
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre_corto"
                :value="old('nombre_corto')"
                placeholder="Ingresé el nombre corto de la actividad"
            />
            @error('nombre_corto')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="nombre_completo" :value="__('Nombre completo')" class="ml-3 mt-1"/>
            <x-text-input 
                id="nombre_completo" 
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre_completo"
                :value="old('nombre_completo')"
                placeholder="Ingresé el nombre completo de la actividad"
            />
            @error('nombre_completo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="trimestre" :value="__('Trimestre en el que se dicta la actividad')" class="ml-3 mt-1"/>
            <x-text-input 
                id="trimestre" 
                class="block mt-1 w-full"
                type="number"
                wire:model="trimestre"
                :value="old('trimestre')"
                placeholder="Ingresé el numero de trimestre"
            />
            @error('trimestre')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="competencia_id" :value="__('Competencia asociada')" class="ml-3 mt-1"/>
            <select 
                wire:model="competencia_id" 
                id="competencia_id"
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
                <option value="" selected disabled>--Seleccione--</option>
                @foreach ($competencias as $competencia)
                    <option value="{{ $competencia->id }}">
                        {{ $competencia->competencia }}
                    </option>
                @endforeach
            </select>

            @error('competencia_id')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="raps" :value="__('Resultados de aprendizaje')" class="ml-3 mt-1"/>
            @foreach ($raps as $rap)
                <div class="flex rounded-lg gap-1 mt-1 p-1 mb-2">
                    <input 
                        type="checkbox" 
                        wire:model="selectedRaps"
                        value="{{ $rap->id }}"
                        id="rap-checkbox-{{ $rap->id }}"
                        wire:key="rap-checkbox-{{ $rap->id }}"
                        class="peer relative w-6 h-6 checked:bg-gradient-to-tr checked:from-blue-400 checked:to-white border border-gray-300 shadow-sm rounded !ring-0 !ring-offset-0 checked:!border-blue-400 hover:border-blue-400 cursor-pointer transition-all duration-300 ease-in-out after:w-[35%] after:h-[53%] after:absolute after:opacity-0 after:top-[40%] 
                            after:left-[50%] after:-translate-x-2/4 after:-translate-y-2/4 after:rotate-[25deg] after:drop-shadow-[1px_0.5px_1px_rgba(56,149,248,0.5)] after:border-r-[0.25em] after:border-r-white after:border-b-[0.25em] after:border-b-white after:transition-all after:duration-200 after:ease-linear checked:after:opacity-100 checked:after:rotate-45"
                    >
                    <label 
                        for="rap-checkbox-{{ $rap->id }}" 
                        class="cursor-pointer rounded-lg border border-gray-300 p-2 transition-colors duration-200 ease-in-out
                        peer-checked:bg-blue-50 peer-checked:text-blue-950 peer-checked:border-blue-400 hover:border-blue-400"
                    >{{ $rap->rap }}</label>
                </div>
                @error('selectedRaps.' . $rap->id)
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            @endforeach
        </div>
        @if ($isEditMode)
            <div class="border-b border-blue-200 mt-2"></div>

            <x-primary-button class="w-full shadow-md mt-3 bg-blue-600 hover:bg-blue-700">
                Editar actividad
            </x-primary-button>

            <div class="flex justify-center items-center mt-3">
                <a  wire:click.prevent="$emit('volverCrear')"
                    class="flex items-center cursor-pointer underline underline-offset-2 text-red-500 hover:font-bold"    
                >               
                    Volver a modo creación
                </a>
            </div>
        @else
            <div class="border-b border-green-400 mt-2"></div>

            <x-primary-button class="w-full shadow-md mt-3 bg-green-600 hover:bg-green-700">
                Crear actividad
            </x-primary-button>
        @endif
    </form>
</div>