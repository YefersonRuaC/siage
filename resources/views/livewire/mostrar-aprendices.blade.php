<div>
        
    <livewire:buscador-aprendices />

    <div class="flex flex-col">
        <div class="py-2 inline-block min-w-full px-0">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 hover:bg-gray-100 border-b border-gray-400 transition">
                        <tr>
                            <th scope="col" class="text-base font-bold px-1 py-1 text-center border-r border-gray-400">
                                Tipo doc
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-gray-400">
                                Documento
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-gray-400">
                                Nombre
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-gray-400">
                                Apellidos
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-gray-400">
                                Celular
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-gray-400">
                                Correo
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center border-r border-gray-400">
                                Estado
                            </th>
                            <th scope="col" class="text-base font-bold px-2 py-1 text-center border-r border-gray-400">
                                Ficha
                            </th>
                            <th scope="col" class="text-base font-bold py-1 text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aprendizs as $aprendiz)
                            <tr class="bg-white text-center @if ($loop->last) @else border-b @endif border-gray-400">
                                <td class="text-sm px-2 py-1 border-r border-gray-400 uppercase">
                                    {{ $aprendiz->tipo_doc }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400">
                                    {{ $aprendiz->id }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400 uppercase">
                                    {{ $aprendiz->name }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400 uppercase">
                                    {{ $aprendiz->apellidos }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400">
                                    {{ $aprendiz->celular }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400">
                                    {{ $aprendiz->email }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400">
                                    {{ $aprendiz->estado }}
                                </td>
                                <td class="text-sm px-2 py-1 border-r border-gray-400">
                                    {{ $aprendiz->ficha_id }}
                                </td>
                                <td class="text-sm px-2 py-2">
                                    <div class="flex flex-col md:flex-row gap-2 justify-center">
                                        <a href="{{ route('aprendices.edit', $aprendiz->id) }}"
                                            class="bg-blue-600 px-2 py-2 md:py-1 rounded-md hover:bg-blue-700 text-white font-bold
                                            shadow-md transition">Editar</a>
                                        <a  wire:click="$emit('mostrarAlerta', {{ $aprendiz->id }})"
                                            class="bg-red-600 px-2 py-2 md:py-1 rounded-md hover:bg-red-700 text-white font-bold
                                            shadow-md transition cursor-pointer">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="9" class="py-4">
                                    <p class="text-gray-400 uppercase">Aun no hay aprendices</p>  
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-10 px-3">
            {{ $aprendizs->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        Livewire.on('mostrarAlerta', (aprendizId) => {
            Swal.fire({
                title: `¿Quieres eliminar el aprendiz identificado con ${aprendizId}?`,
                text: "¡No podras revertir esta accion despues!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#707070',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarAprendiz', aprendizId)

                Swal.fire(
                    'Eliminado!',
                    'El aprendiz ha sido eliminado correctamente.',
                    'success'
                )
            }
            })
        });
    </script>
@endpush