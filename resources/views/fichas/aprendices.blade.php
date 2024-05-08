<x-app-layout>
    <div class="bg-white p-10 flex flex-col justify-center items-center">
        <h1 class="font-bold uppercase text-2xl">Importar aprendices</h1>
        @if(session('error'))
        <div class="flex justify-center items-center gap-1 mt-4 text-red-700 font-bold rounded-lg border-b-4 border-red-600 space-y-1 bg-red-100 py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg> 
            {{-- 
                {!! nl2br(e(session('error'))) !!}: Permite que los salto de linea (PHP_EOL) pasados en
                AprendizImport.php sean tomados y aplicados correctamente al mostrar el mensaje
            --}}
            <div class="block">{!! nl2br(e(session('error'))) !!}</div>
        </div>
        @endif

        @if(session('success'))
        <div class="flex justify-center items-center gap-1 mt-4 text-green-700 font-bold rounded-lg border-b-4 border-green-600 space-y-1 bg-green-100 py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>                           
            {{ session('success') }}
        </div>
        @endif
        <div class="py-3">
            <form 
                action="{{ url('/aprendices/importar') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col justify-center items-center"
            >
                @csrf
                <div class="py-4">
                    <input 
                        type="file" 
                        name="documento" 
                        id="documento"
                        accept=".xlsx, .xls, .csv"
                        class="appearance-none block w-full bg-white border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                    >
                    <x-input-error :messages="$errors->get('documento')" class="mt-2" />
                </div>
                <button
                    class="bg-blue-600 hover:bg-blue-700 uppercase font-bold text-white px-4 py-2
                    rounded-md shadow-sm w-full"
                    type="submit"
                >Importar</button>
            </form>
        </div>   
    </div>
</x-app-layout>