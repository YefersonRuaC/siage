<div class="pb-3">
    <h1 class="text-center text-2xl font-bold">Competencias y resultados de aprendizaje</h1>
    <h2 class="text-center font-normal text-lg text-gray-800">
        {{ $programa->nombre_corto }} - {{ $programa->nombre_completo }}
    </h2>

    @forelse ($competencias as $competencia)
        <div class="mt-4">
            <div 
                class="flex justify-between items-center shadow bg-gray-100 px-4 py-3 rounded-md cursor-pointer hover:bg-gray-200 transition-all"
                onclick="toggleDropdown('{{ $competencia->id }}')"
            >
                <h4 class="font-bold flex-auto">{{ $competencia->competencia }}</h4>
                <div class="flex gap-3 ml-1">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-3">
                        {{-- <a  href="{{ route('programas.edit', $programa->codigo) }}" --}}
                        <a  href="#"
                            class="bg-blue-600 px-2 py-1 rounded-md text-center hover:bg-blue-700 text-white font-bold transition-all"
                        >Editar</a>
                        <a  
                            wire:click="$emit('mostrarAlertaCompetencia', '{{ $competencia->id }}')"
                            class="bg-red-600 px-2 py-1 rounded-md text-center hover:bg-red-700 text-white font-bold transition-all"
                        >Eliminar</a>
                    </div>
                    <button
                        id="toggleBtn-{{ $competencia->id }}"
                        class="px-2 py-1 rounded hover:bg-gray-300"
                        aria-expanded="false"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-auto transition">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                        </svg>                          
                    </button>
                </div>
            </div>

            <div 
                id="dropdownContent-{{ $competencia->id }}"
                class="hidden mt-2 bg-white shadow-md rounded-md overflow-hidden transition-all duration-300"
            >
                @forelse ($competencia->raps as $rap)
                    <div class="flex px-4 py-4 border-b last-of-type:border-none border-gray-300">
                        <p class="text-gray-700 flex-auto">● {{ $rap->rap }}</p>
                        <div class="flex flex-col items-center justify-center ml-2">
                            {{-- <a  href="#"
                                class="bg-blue-200 whitespace-nowrap px-4 py-2 text-sm text-center rounded-md hover:bg-blue-300 font-bold transition-all"
                            >Editar rap</a> --}}
                            <a  
                                wire:click="$emit('mostrarAlertaRap', '{{ $rap->id }}')"
                                class="bg-red-200 whitespace-nowrap text-red-950 px-2 py-2 text-sm text-center rounded-md hover:bg-red-300 font-bold transition cursor-pointer"
                            >Eliminar rap</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center px-4 py-2 text-gray-400">Esta competencia aún no tiene resultados de aprendizaje</p>
                @endforelse
            </div>
        </div>
    @empty
        <p class="text-center text-gray-400 uppercase mt-5">Aun no hay competencias creadas para este programa</p>
    @endforelse
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        Livewire.on('mostrarAlertaCompetencia', (competenciaId) => {
            Swal.fire({
                title: '¿Quieres eliminar esta competencia?',
                text: "¡Eliminaras tambien los resultados de aprendizaje asociados y no podras revertir esto despues!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#707070',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacante
                Livewire.emit('eliminarCompetencia', competenciaId);

                //Mensaje de confirmacion
                Swal.fire(
                    'Eliminado!',
                    'La competencia ha sido eliminada correctamente.',
                    'success'
                )
            }
            })
        });

        Livewire.on('mostrarAlertaRap', (rapId) => {
            Swal.fire({
                title: '¿Quieres eliminar este resultado de aprendizaje?',
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
                Livewire.emit('eliminarRap', rapId);

                //Mensaje de confirmacion
                Swal.fire(
                    'Eliminado!',
                    'El resultado de aprendizaje ha sido eliminado correctamente.',
                    'success'
                )
            }
            })
        });

        function toggleDropdown(competenciaId) {
            const toggleBtn = document.getElementById(`toggleBtn-${competenciaId}`);
            const dropdownContent = document.getElementById(`dropdownContent-${competenciaId}`);

            if (dropdownContent.classList.contains('hidden')) {
                dropdownContent.classList.remove('hidden');
                dropdownContent.classList.add('block'); 
                toggleBtn.setAttribute('aria-expanded', 'true');
            } else {
                dropdownContent.classList.add('hidden');
                dropdownContent.classList.remove('block');
                toggleBtn.setAttribute('aria-expanded', 'false');
            }
        }
    </script>
@endpush