<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-6 py-12">
        <div class="flex justify-between h-14 mt-2 md:mt-0 mb-2">
            <div class="flex justify-center items-center">
                <!-- Logo -->
                <div class="">
                @if (auth()->user()?->rol == 1)
                    <a href="{{ route('aprendiz.index') }}">
                        <x-application-logo class="" />
                    </a>
                @endif
                @if (auth()->user()?->rol == 2)
                    <a href="{{ route('instructor.index') }}">
                        <x-application-logo class="" />
                    </a>
                @endif
                @if (auth()->user()?->rol == 3)
                    <a href="{{ route('admin.index') }}">
                        <x-application-logo class="" />
                    </a>
                @endif
                @if (auth()->user()?->rol == 4)
                    <a href="{{ route('apoyo.index') }}">
                        <x-application-logo class="" />
                    </a>
                @endif
                @if (auth()->user()?->rol == 5)
                    <a href="{{ route('practica.index') }}">
                        <x-application-logo class="" />
                    </a>
                @endif
                </div>
                <div class="flex flex-col justify-center mr-8 md:mr-0">
                    <div class="border-b-4 border-blue-700">
                        <h1 class="text-2xl md:text-3xl text-blue-900 mb-1">
                            <span class="font-extrabold">S</span>istema <span class="font-extrabold">I</span>ntegrado de 
                            <span class="font-extrabold">A</span>dministración y <span class="font-extrabold">G</span>estión 
                            <span class="font-extrabold">E</span>ducativa
                        </h1>
                    </div>
                    <div class="mt-1">
                        <h2 class="text-xl md:text-2xl text-lime-600 font-bold">Apoyo a la formación</h2>
                    </div>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent uppercase text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-100 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()?->name }} {{ Auth::user()?->apellidos }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link 
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();" 
                                class="text-red-700 hover:text-red-900 hover:bg-red-100 transition font-bold uppercase flex gap-1 justify-center items-center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>  
                                {{ __('Cerrar sesion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 bg-gray-100 hover:text-gray-500 hover:bg-gray-200 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
        @if (auth()->user()?->rol == 1)
            <x-responsive-nav-link 
                :href="route('aprendiz.index')" 
                :active="request()->routeIs('aprendiz.index')"
                class="text-blue-700 border-blue-500 hover:border-blue-800 hover:bg-blue-100 hover:text-blue-800 font-bold"
            >
                {{ __('Index aprendiz') }}
            </x-responsive-nav-link>
        @endif
        @if (auth()->user()?->rol == 2)
            <x-responsive-nav-link 
                :href="route('instructor.index')" 
                :active="request()->routeIs('aprendiz.index')"
                class="text-blue-700 border-blue-500 hover:border-blue-800 hover:bg-blue-100 hover:text-blue-800 font-bold"
            >
                {{ __('Index instructor') }}
            </x-responsive-nav-link>
        @endif
        @if (auth()->user()?->rol == 3)
            <x-responsive-nav-link 
                :href="route('admin.index')" 
                :active="request()->routeIs('aprendiz.index')"
                class="text-blue-700 border-blue-500 hover:border-blue-800 hover:bg-blue-100 hover:text-blue-800 font-bold"
            >
                {{ __('Index admin') }}
            </x-responsive-nav-link>
        @endif
        @if (auth()->user()?->rol == 4)
            <x-responsive-nav-link 
                :href="route('apoyo.index')" 
                :active="request()->routeIs('aprendiz.index')"
                class="text-blue-700 border-blue-500 hover:border-blue-800 hover:bg-blue-100 hover:text-blue-800 font-bold"
            >
                {{ __('Index apoyo') }}
            </x-responsive-nav-link>
        @endif
        @if (auth()->user()?->rol == 5)
            <x-responsive-nav-link 
                :href="route('practica.index')" 
                :active="request()->routeIs('aprendiz.index')"
                class="text-blue-700 border-blue-500 hover:border-blue-800 hover:bg-blue-100 hover:text-blue-800 font-bold"
            >
                {{ __('Index practica') }}
            </x-responsive-nav-link>
        @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()?->name }} {{ Auth::user()?->apellidos }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()?->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link 
                        :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        class="text-red-700 border-red-500 hover:border-red-800 hover:bg-red-100 hover:text-red-800 font-bold uppercase flex gap-1 items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>  
                        {{ __('Cerrar sesion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>