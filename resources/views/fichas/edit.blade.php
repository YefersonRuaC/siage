<x-app-layout>
    <div class="px-2 md:px-32">
    @if (auth()->user()->rol == 3)
        <a  href="{{ route('admin.index') }}" 
            class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 py-1 px-3 mb-3
            rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow transition"
        >
    @endif
    @if (auth()->user()->rol == 4)
        <a  href="{{ route('apoyo.index') }}" 
            class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 py-1 px-3 mb-3
            rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow transition"
        >   
    @endif
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
                <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg> 
            Volver     
        </a>

        <livewire:editar-ficha
            :ficha="$ficha"
        />
    </div>
</x-app-layout>