<div class="pb-3">
    <h1 class="text-center text-2xl font-black">Actividades de aprendizaje</h1>
    <h2 class="text-center font-normal text-lg text-gray-600">
        {{ $programa->nombre_corto }} - {{ $programa->nombre_completo }}
    </h2>
    
    @foreach ($actividadesPorTrimestre as $trimestre => $actividades)
        <div class="mt-2 ml-2">
            <p class="font-normal">Actividades de aprendizaje trimestre <span class="font-bold">{{ $trimestre }}</span></p>
        </div>
        
        @foreach ($actividades as $actividad)
            <div class="mt-2">
                <div
                    class="flex justify-between items-center border border-green-500 hover:border-green-400 bg-gray-100 px-2 py-3 cursor-pointer rounded hover:bg-gray-200 transition-all"
                    onclick="toggleDropdown('{{ $actividad->id }}')"
                >
                    <h4 class="font-bold flex-auto">{{ $actividad->nombre_corto }}</h4>
                    <div class="flex gap-2 ml-1">
                        <div class="flex flex-col md:flex-row gap-2">
                            <a  wire:click.prevent="$emit('cargarActividad', '{{ $actividad->id }}')"
                                class="bg-blue-700 px-1 py-1 rounded-md text-center hover:bg-blue-800 text-white font-bold transition-all"
                            >Editar</a>
                            <a  wire:click="$emit('mostrarAlerta', '{{ $actividad->id }}')"
                                class="bg-red-600 px-1 py-1 rounded-md text-center hover:bg-red-700 text-white font-bold transition-all"
                            >Eliminar</a>
                        </div>
                        <button
                            id="toggleBtn-{{ $actividad->id }}"
                            class="px-2 py-1 rounded hover:bg-gray-300"
                            aria-expanded="false"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-auto transition-all">
                                <path fill-rule="evenodd" d="M11.47 4.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1-1.06 1.06L12 6.31 8.78 9.53a.75.75 0 0 1-1.06-1.06l3.75-3.75Zm-3.75 9.75a.75.75 0 0 1 1.06 0L12 17.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-3.75 3.75a.75.75 0 0 1-1.06 0l-3.75-3.75a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>                                                  
                        </button>
                    </div>
                </div>

                <div 
                    id="dropdownContent-{{ $actividad->id }}"
                    class="hidden overflow-hidden transition-all duration-300 border-b border-green-500"
                >
                    <div class="p-2 space-y-1">
                        <p class="font-bold">Nombre completo: <span class="font-normal text-gray-700">{{ $actividad->nombre_completo }}</span></p>
                        <p class="font-bold">Competencia:</p>
                        <p class="text-gray-700">{{ $actividad->competencia->competencia }}</span></p>
                        <p class="font-bold">Resultados de apredizaje asociados:</p>
                            @forelse ($actividad->raps as $rap)
                                <p class="text-gray-700"><span class="text-black">● </span>{{ $rap->rap }}</p>
                            @empty
                                <p class="text-gray-400">Esta actividad de aprendizaje aun no tiene RAPS asociados</p>
                            @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        Livewire.on('mostrarAlerta', (actividadId) => {
            Swal.fire({
                title: '¿Quieres eliminar esta actividad de aprendizaje?',
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
                Livewire.emit('eliminarActividad', actividadId);

                //Mensaje de confirmacion
                Swal.fire(
                    'Eliminado!',
                    'La actividad de aprendizaje ha sido eliminada correctamente.',
                    'success'
                )
            }
            })
        });

        const toggleDropdown = (actividadId) => {
            const toggleBtn = document.getElementById(`toggleBtn-${actividadId}`);
            const dropdownContent = document.getElementById(`dropdownContent-${actividadId}`);

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