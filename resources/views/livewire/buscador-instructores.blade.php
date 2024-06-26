<div class="bg-blue-50 mx-0 py-4 px-4 mb-2">
    <h2 class="text-3xl text-center font-semibold pb-2">Filtrar y buscar instructores</h2>

    <form wire:submit.prevent='leerDatosInstructor'>
        <div class="md:grid md:grid-cols-2 gap-3">
            <div>
                <x-input-label for="idBuscar" :value="__('Numero de documento')" class="ml-1"/>
                <x-text-input 
                    id="idBuscar" 
                    class="block mt-1 w-full"
                    type="number"
                    wire:model="idBuscar"
                    :value="old('idBuscar')"
                    placeholder="Ingresé el documento del instructor"
                />
            </div>

            <div>
                <x-input-label for="tipoBuscar" :value="__('Tipo de instructor')" class="ml-1"/>
                <select 
                    wire:model="tipoBuscar" 
                    id="tipoBuscar" 
                    class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                    shadow-sm w-full"
                >
                <option value="" selected disabled>--Seleccione--</option>
                <option value="funcionario">FUNCIONARIO</option>
                <option value="contratista">CONTRATISTA</option>
                </select>
            </div>
        </div>

        <div class="flex justify-between mt-4">
            <button 
                type="button"
                wire:click="limpiarCampos"
                class="bg-gray-200 hover:bg-gray-300 transition text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-auto"
            >
                Limpiar filtros
            </button>
            <input 
                type="submit"
                class="bg-green-700 hover:bg-green-800 transition text-white text-sm font-bold px-16 py-2 rounded cursor-pointer uppercase w-auto"
                value="Listar"
            />
        </div>
    </form>
</div>