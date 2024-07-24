<div>
    <livewire:buscador-instructores />

    <div class="flex flex-col">
        <div class="inline-block min-w-full px-0">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-50 hover:bg-blue-100 border-b border-blue-200 transition">
                        <tr>
                            <th scope="col" class="text-base font-bold px-1 py-1 text-center border-r border-blue-200">
                                Tipo doc
                            </th>
                            <th scope="col" class="text-base font-bold px-2 py-1 text-center border-r border-blue-200">
                                Documento
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-blue-200">
                                Nombre
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-blue-200">
                                Apellidos
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-blue-200">
                                Celular
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-blue-200">
                                Correo
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-blue-200">
                                Dirección
                            </th>
                            <th scope="col" class="text-base font-bold px-2 py-1 text-center border-r border-blue-200">
                                Tipo
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($instructors as $instructor)
                            <tr class="bg-gray-50 text-center border-b last-of-type:border-none border-blue-200">
                                <td class="text-sm px-2 py-1 border-r border-blue-200 uppercase">
                                    {{ $instructor->tipo_doc }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200">
                                    {{ $instructor->id }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200 uppercase">
                                    {{ $instructor->name }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200 uppercase">
                                    {{ $instructor->apellidos }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200">
                                    {{ $instructor->celular }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200">
                                    {{ $instructor->email }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200">
                                    {{ $instructor->direccion }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-blue-200">
                                    {{ $instructor->tipo }}
                                </td>
                                <td class="text-sm px-2 py-2">
                                    <div class="flex flex-col md:flex-row gap-2 justify-center">
                                        <a href="{{ route('instructores.edit', $instructor->id) }}"
                                            class="bg-blue-600 px-2 py-2 md:py-1 rounded-md hover:bg-blue-700 text-white font-bold
                                            shadow-md transition">Editar</a>
                                        <a  wire:click="$emit('mostrarAlerta', {{ $instructor->id }})"
                                            class="bg-red-600 px-2 py-2 md:py-1 rounded-md hover:bg-red-700 text-white font-bold
                                            shadow-md transition cursor-pointer">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="9" class="py-4">
                                    <p class="text-gray-400 uppercase">Aun no hay instructores</p>  
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-10 px-3">
            {{ $instructors->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        Livewire.on('mostrarAlerta', (instructorId) => {
            Swal.fire({
                title: `¿Quieres eliminar el instructor identificado con ${instructorId}?`,
                text: "¡No podras revertir esta accion despues!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#707070',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarInstructor', instructorId)

                Swal.fire(
                    'Eliminado!',
                    'El instructor ha sido eliminado correctamente.',
                    'success'
                )
            }
            })
        });
    </script>
@endpush