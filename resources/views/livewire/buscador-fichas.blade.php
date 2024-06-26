<div class="bg-gray-100 mx-0 md:mx-1 py-6 md:py-4 px-6">
    <h2 class="text-3xl text-center font-semibold pb-2">Filtrar y buscar fichas en formación</h2>

    <form wire:submit.prevent='leerDatosFicha'>
        <div class="md:grid md:grid-cols-2 gap-3">
            <div>
                <x-input-label for="fichaBuscar" :value="__('Numero de la ficha')" class="ml-1"/>
                <x-text-input 
                    id="fichaBuscar" 
                    class="block mt-1 w-full"
                    type="number"
                    wire:model="fichaBuscar"
                    :value="old('fichaBuscar')"
                    placeholder="Ingresé el número de la ficha"
                />
            </div>

            <div>
                <x-input-label for="programaBuscar" :value="__('Nombre de programa')" class="ml-1"/>
                <x-text-input 
                    id="programaBuscar" 
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="programaBuscar"
                    :value="old('programaBuscar')"
                    placeholder="Ingresé el nombre del programa"
                />
            </div>

            <div>
                <x-input-label for="jornadaBuscar" :value="__('Jornada')" class="ml-1"/>
                <select 
                    wire:model="jornadaBuscar" 
                    id="jornadaBuscar" 
                    class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                    shadow-sm w-full"
                >
                <option value="" selected disabled>--Seleccione--</option>
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
                </select>
            </div>

            <div>
                <x-input-label for="trimestreBuscar" :value="__('Trimestre')" class="ml-1"/>
                <select 
                    wire:model="trimestreBuscar" 
                    id="trimestreBuscar" 
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
            </div>
        </div>

        <div class="flex justify-between mt-4">
            <button 
                type="button"
                wire:click="limpiarCampos"
                class="bg-gray-300 hover:bg-gray-200 transition text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-auto"
            >
                Limpiar filtros
            </button>
            <input 
                type="submit"
                class="bg-lime-600 hover:bg-lime-700 transition text-white text-sm font-bold px-16 py-2 rounded cursor-pointer uppercase w-auto"
                value="Listar"
            />
        </div>
    </form>
</div>
