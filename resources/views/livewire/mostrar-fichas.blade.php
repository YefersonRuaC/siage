<div>
        
    <livewire:buscador-fichas />

    <div class="flex flex-col">
        <div class="py-2 inline-block min-w-full px-2">
            <table class="min-w-full">
                <thead class="bg-gray-100 hover:bg-gray-200 border-b border-gray-300 transition">
                    <tr>
                        <th scope="col" class="font-bold py-4 text-center border-r border-white">
                            Ficha
                        </th>
                        <th scope="col" class="font-bold py-4 text-center border-r border-white">
                            Programa
                        </th>
                        <th scope="col" class="font-bold py-4 text-center border-r border-white">
                            Jornada
                        </th>
                        <th scope="col" class="font-bold px-2 py-4 text-center border-r border-white">
                            Trimestre
                        </th>
                        <th scope="col" class="font-bold py-4 text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fichas as $ficha)
                    <tr class="bg-white border-b text-center">
                        <td class="px-2 md:px-4 py-4 border-r">
                            <x-dropdown align="right" width="w-full md:w-52">
                                <x-slot name="trigger">
                                    <button class="bg-gray-200 px-3 flex py-2 rounded-md hover:bg-gray-300 shadow-md transition font-bold"
                                    >
                                    {{ $ficha->ficha }}
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('admin.index')" class="font-bold flex items-center justify-center px-10 md:px-0">
                                        {{ __('Ver aprendices') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('fichas.actualizar', $ficha->ficha)" class="font-bold flex items-center justify-center px-10 md:px-0">
                                        {{ __('Actualizar ficha completa') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </td>
                        <td class="px-3 py-4 border-r">
                            {{ $ficha->programa }}
                        </td>
                        <td class="px-1 md:px-3 py-4 border-r uppercase">
                            {{ $ficha->jornada }}
                        </td>
                        <td class="px-1 md:px-3 py-4 border-r">
                            {{ $ficha->trimestre }}
                        </td>
                        <td class="px-2 md:px-4 py-4">
                            <div class="flex gap-2 md:gap-5 justify-center">
                                <a  href="{{ route('fichas.edit', $ficha->ficha) }}"
                                    class="bg-blue-600 px-3 py-2 rounded-md hover:bg-blue-700 text-white font-bold
                                    shadow-md transition"
                                >Editar</a>
                                <a  wire:click="$emit('mostrarAlerta', {{ $ficha->ficha }})"
                                    class="bg-red-600 px-3 py-2 rounded-md hover:bg-red-700 text-white font-bold
                                    shadow-md transition cursor-pointer"    
                                >Eliminar</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="5" class="py-4">
                            <p class="text-gray-400 uppercase">Aun no hay fichas creadas</p>  
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-10 px-3">
            {{ $fichas->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        Livewire.on('mostrarAlerta', (fichaId) => {
            Swal.fire({
                title: '¿Quieres eliminar esta ficha?',
                text: "¡Eliminaras tambien los aprendices asociados y no podras revertir esto despues!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#707070',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacante
                Livewire.emit('eliminarFicha', fichaId)

                //Mensaje de confirmacion
                Swal.fire(
                    'Eliminada!',
                    'La ficha ha sido eliminada correctamente.',
                    'success'
                )
            }
            })
        });
    </script>
@endpush