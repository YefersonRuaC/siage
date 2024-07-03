<div>
        
    <livewire:buscador-fichas />

    <div class="flex flex-col">
        <div class="py-2 inline-block min-w-full px-0 md:px-1">
            <div class="overflow-x-auto">
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
                        <tr class="bg-white text-center border-b last-of-type:border-none">
                            <td class="px-2 md:px-4 py-4 border-r">
                                <p class="font-bold bg-gray-100 p-2 rounded-md">{{ $ficha->ficha }}</p>
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
                                <div class="flex flex-col md:flex-row gap-5 justify-center">
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
                title: `¿Quieres eliminar la ficha ${fichaId}?`,
                text: '¡Eliminaras tambien los aprendices asociados y no podras revertir esto despues!',
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