<div class="flex flex-col">
    <div class="py-2 inline-block min-w-full px-2">
        <table class="min-w-full">
            <thead class="bg-gray-800 hover:bg-gray-700 border-b border-gray-400 transition">
                <tr>
                    <th scope="col" class="text-white font-bold py-4 text-center border-r border-gray-400">
                        Programa
                    </th>
                    <th scope="col" class="text-white font-bold px-2 py-4 text-center border-r border-gray-400">
                        Nombre corto
                    </th>
                    <th scope="col" class="text-white font-bold py-4 text-center border-r border-gray-400">
                        Nombre completo
                    </th>
                    <th scope="col" class="text-white font-bold py-4 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($programas as $programa)
                <tr class="bg-gray-100 border-b border-gray-300 text-center">
                    <td class="px-2 md:px-4 py-4 border-r border-gray-300">
                        <a  href="#"
                            class="inline-flex text-white bg-gray-700 px-3 py-2 rounded-md hover:bg-gray-600 shadow-md transition font-bold"
                        >Ver programa</a>
                    </td>
                    <td class="px-3 py-4 border-r border-gray-300">
                        {{ $programa->nombre_corto }}
                    </td>
                    <td class="px-2 py-4 border-r border-gray-300">
                        {{ $programa->nombre_completo }}
                    </td>
                    <td class="px-2 md:px-4 py-4">
                        <div class="flex gap-2 md:gap-5 justify-center">
                            <a  href="{{ route('programas.edit', $programa->programa) }}"
                                class="bg-blue-600 px-3 py-2 rounded-md hover:bg-blue-700 text-white font-bold
                                shadow-md transition"
                            >Editar</a>
                            <a  wire:click="$emit('mostrarAlerta', {{ $programa->programa }})"
                                class="bg-red-600 px-3 py-2 rounded-md hover:bg-red-700 text-white font-bold
                                shadow-md transition cursor-pointer"    
                            >Eliminar</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="5" class="py-4">
                        <p class="text-gray-400 uppercase">Aun no hay programas de formacion creados</p>  
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-10 px-3">
        {{ $programas->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        Livewire.on('mostrarAlerta', (programaId) => {
            Swal.fire({
                title: '¿Quieres eliminar este programa de formación?',
                text: "¡No podras revertir esta accion despues!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#707070',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacante
                Livewire.emit('eliminarPrograma', programaId)

                //Mensaje de confirmacion
                Swal.fire(
                    'Eliminado!',
                    'El programa ha sido eliminado correctamente.',
                    'success'
                )
            }
            })
        });
    </script>
@endpush