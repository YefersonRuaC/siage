<x-app-layout>
    @if(session('error'))
        <div class="flex justify-center items-center mb-1 text-red-700 font-bold rounded-lg border-b-4 border-red-600 space-y-1 bg-red-100 py-2 px-4">
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

    @if (session()->has('mensaje'))
        <livewire:mostrar-exito />              
    @endif

    <div class="px-5 md:px-32 py-2">
        <div class="bg-gray-50 rounded-md shadow-md px-8 py-5">
            <h1 class="font-bold text-center text-2xl text-gray-900">Importar aprendices</h1>
            
            <div class="border-b border-gray-300 my-5"></div>
    
            <form action="{{ url('/aprendices/importar') }}" method="POST" enctype="multipart/form-data" class="">
                @csrf
                {{--Ficha--}}
                <div class="w-full">
                    <x-input-label for="ficha" :value="__('Ficha asociada')" class="mb-1 ml-3" />
                    <select 
                        name="ficha"
                        id="ficha" 
                        class="select2 w-3/4 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md"
                    >
                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($fichas as $ficha)
                        <option value="{{ $ficha->ficha }}">{{ $ficha->ficha }} {{ $ficha->programa }}</option>
                    @endforeach
    
                    </select>
                    <x-input-error :messages="$errors->get('ficha')" class="mt-2" />
                </div>
    
                {{--Aprendices--}}
                <div class="mt-4">
                    <x-input-label for="trimestre" :value="__('Seleccione la lista de aprendices')" class="ml-2"/>
                    <input 
                        type="file" 
                        name="documento" 
                        id="documento"
                        accept=".xlsx, .xls, .csv"
                        class="appearance-none block w-full mt-1 bg-white border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                    >
                    <x-input-error :messages="$errors->get('documento')" class="mt-2" />
                </div>
                
                <div class="border-b border-gray-300 my-5"></div>
    
                <x-primary-button class="w-full shadow-md bg-green-600 hover:bg-green-700">
                    Importar
                </x-primary-button>
            </form> 
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('livewire:load', () => {
        $('.select2').select2()
    })
</script>