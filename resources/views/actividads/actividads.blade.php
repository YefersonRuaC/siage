<x-app-layout>
    <div class="flex">
        <a  href="{{ route('programas.index') }}" 
            class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 py-1 px-3 mb-0 md:mb-2
            rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
                <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg> 
            Volver     
        </a>
        @if (session()->has('mensaje'))
            <livewire:mostrar-exito />             
        @endif
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 order-2 md:order-1">
            <livewire:mostrar-actividads
                :programa="$programa"
            />
        </div>
        
        <div class="col-span-12 md:col-span-6 order-1 md:order-2 border-b md:border-b-0 md:border-l 
            border-gray-200 py-5 mb-5 md:py-0 md:mb-0 px-0 ml-0 md:pl-3 md:ml-5 ">
            <livewire:crear-actividads 
                :programa="$programa"
            />
        </div>
    </div>
</x-app-layout>