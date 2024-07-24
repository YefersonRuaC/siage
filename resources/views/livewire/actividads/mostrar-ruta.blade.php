<div>
    <div class="border-b-4 border-red-500">
        PROGRAMA: {{ $programa }}
    </div>
    @foreach ($actividadesPorTrimestre as $trimestre => $actividades)
        <div class="mt-2 ml-2">
            <p class="font-bold">TRIMESTRE: <span class="font-normal">{{ $trimestre }}</span></p>
        </div>
        
        @foreach ($actividades as $actividad)
            <div class="border-b-4 border-blue-400">
                <p class="font-bold">ACTIVIDAD: <span class="font-normal">{{ $actividad }}</span></p>
            </div>
            @forelse ($actividad->raps as $rap)
                <div class="border-b-4 border-yellow-400">
                    <p class="font-bold">RAP: <span class="font-normal">{{ $rap }}</span></p>
                </div>
            @empty
            <div class="border-b-4 border-yellow-400 text-gray-400">
                No hay raps
            </div>
            @endforelse
        @endforeach
    @endforeach
</div>
