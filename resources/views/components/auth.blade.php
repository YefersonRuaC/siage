<div>
    <header class="flex mb-2">
        <div class="w-auto h-auto">
            <a href="/">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo sena" class="hover:brightness-75 transition duration-500">
            </a>
        </div>
        <div class="flex flex-col justify-center">
            <div class="border-b-4 border-blue-700">
                <h1 class="text-3xl md:text-4xl text-blue-900 mb-1">
                    <span class="font-extrabold">S</span>istema <span class="font-extrabold">I</span>ntegrado de 
                    <span class="font-extrabold">A</span>dministración y <span class="font-extrabold">G</span>estión 
                    <span class="font-extrabold">E</span>ducativa
                </h1>
            </div>
            <div class="mt-1">
                <h2 class="text-xl md:text-2xl text-lime-600 font-bold">Apoyo a la formación</h2>
            </div>
        </div>
        {{-- @if (Route::has('login'))
            <div class="flex justify-center items-center ml-7">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
    </header>

    <main class="grid grid-cols-1 md:grid-cols-12 gap-4">

        <div class="col-span-1 md:col-span-8 rounded-md w-auto h-auto">
            <img src="{{ asset('images/centro.jpg') }}" alt="Imagen ctma" class="rounded-md">
        </div>

        <div class="col-span-1 md:col-span-4 border border-gray-300 rounded-md">

            @if(Route::is('login'))
                <div class="bg-gradient-to-t from-gray-100 via-gray-100 to-transparent py-4 rounded-t-md relative">
                    <h2 class="text-3xl text-center text-blue-800 font-bold">
                        ● Inicia sesión ●
                    </h2>
                </div>
            @elseif(Route::is('password.request'))
                <div class="bg-gradient-to-t from-gray-100 via-gray-100 to-transparent py-4 rounded-t-md relative">
                    <h2 class="text-3xl text-center text-blue-800 font-bold">
                        Restablecer contraseña
                    </h2>
                </div>
            @else
                <div class="bg-gradient-to-t from-gray-100 via-gray-100 to-transparent py-4 rounded-t-md relative">
                    <h2 class="text-3xl text-center text-blue-800 font-bold">
                        Cambio de contraseña
                    </h2>
                </div>
            @endif
            
            <div class="p-2">
                {{ $slot }}
            </div>
        </div>
    </main>

    <footer class="px-2 mb-4 mx-auto">
        <hr class="my-4 border-gray-200"/>
    
        <div class="flex gap-3 md:gap-0 flex-col items-center md:flex-row md:justify-between">
            <p class="text-md text-gray-500">Centro de Tecnología de la Manufactura Avanzada</p>
    
            {{-- <a href="/" class="flex justify-center">
                <img src="{{ asset('images/logo2.png') }}" alt="" class="h-16">
            </a> --}}
    
            <p class="text-md text-gray-500">© Copyright 2024. Todos los derechos reservados.</p>
        </div>
    </footer>
</div>