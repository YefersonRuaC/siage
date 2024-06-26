<div class="bg-gray-50 mx-0 py-4 px-4">
    <h2 class="text-3xl text-center font-semibold pb-2">Filtrar y buscar aprendices</h2>

    <form wire:submit.prevent='leerDatosAprendiz'>
        <div class="md:grid md:grid-cols-3 gap-3">
            <div>
                <x-input-label for="idBuscar" :value="__('Numero de documento')" class="ml-1"/>
                <x-text-input 
                    id="idBuscar" 
                    class="block mt-1 w-full"
                    type="number"
                    wire:model="idBuscar"
                    :value="old('idBuscar')"
                    placeholder="Ingresé el documento del aprendiz"
                />
            </div>

            <div>
                <x-input-label for="fichaBuscar" :value="__('Numero de la ficha')" class="ml-1"/>
                <x-text-input 
                    id="fichaBuscar" 
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="fichaBuscar"
                    :value="old('fichaBuscar')"
                    placeholder="Ingresé el numero de la ficha"
                />
            </div>

            <div>
                <x-input-label for="estadoBuscar" :value="__('Estado del aprendiz')" class="ml-1"/>
                <select 
                    wire:model="estadoBuscar" 
                    id="estadoBuscar" 
                    class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                    shadow-sm w-full"
                >
                <option value="" selected disabled>--Seleccione--</option>
                <option value="en formacion">EN FORMACION</option>
                <option value="trasladado">TRASLADADO</option>
                <option value="condicionado">CONDICIONADO</option>
                <option value="aplazado">APLAZADO</option>
                <option value="retiro voluntario">RETIRO VOLUNTARIO</option>
                <option value="cancelado">CANCELADO</option>
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
                class="bg-green-600 hover:bg-green-700 transition text-white text-sm font-bold px-16 py-2 rounded cursor-pointer uppercase w-auto"
                value="Listar"
            />
        </div>
    </form>
</div>