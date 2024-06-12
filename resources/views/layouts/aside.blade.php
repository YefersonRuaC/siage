<aside class="bg-gray-100">
    <div id="sidebar" class="sidebar transition-all duration-1000 ease-in-out md:h-full h-auto md:w-16 
        overflow-auto overflow-x-hidden md:overflow-hidden border-r w-full md:hover:w-72 hover:bg-white hover:shadow-lg">

    @if (auth()->user()?->rol == 1)
        <div class="flex flex-col justify-between pt-4 md:w-max w-full">
            <div class="w-max flex justify-center items-center ml-2.5 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <a href="{{ route('aprendiz.index') }}" class="text-xl -ml-0.5 py-2 px-2 bg-gray-100 hover:bg-gray-200 rounded-md">Inicio:
                        <span class="font-bold">Aprendiz</span>
                </a>
                <button id="toggleSidebarSize" class="bg-gray-200 px-2 py-1 rounded-md md:block hidden">
                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="mt-2 -mr-4">
                <div class="hover:bg-gray-100 min-w-max cursor-pointer ">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>           
                                <div class="flex w-full items-center justify-between"> 
                                    <div class="text-xl">Horario</div>
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 1') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 2') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 3') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 4') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 5') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 6') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 7') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                
                <div class="hover:bg-gray-100 min-w-max cursor-pointer">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>
                                <div class="flex w-full items-center justify-between">                                    
                                    <div class="text-xl">Notas</div>
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('aprendiz.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Index aprendiz') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 2') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 3') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 4') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 5') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 6') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Trimestre 7') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()?->rol == 2)
        <div class="flex flex-col justify-between pt-4 md:w-max w-full">
            <div class="w-max flex justify-center items-center ml-2.5 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <a href="{{ route('instructor.index') }}" class="text-xl -ml-0.5 py-2 px-2 bg-gray-100 hover:bg-gray-200 rounded-md">Inicio:
                    <span class="font-bold">Instructor</span>
                </a>
                <button id="toggleSidebarSize" class="bg-gray-200 px-2 py-1 rounded-md md:block hidden">
                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="mt-2 -mr-4">
                <div class="hover:bg-gray-100 min-w-max cursor-pointer ">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                </svg>                                  
                                <div class="flex w-full items-center justify-between">  
                                    <div class="text-xl">Asistencia</div>
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('instructor.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Link') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                
                <div class="hover:bg-gray-100 min-w-max cursor-pointer">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>
                                <div class="flex w-full items-center justify-between">  
                                    <div class="text-xl">Notas</div>
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('instructor.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Index instructor') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="hover:bg-gray-100 min-w-max cursor-pointer">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg> 
                                <div class="flex w-full items-center justify-between">  
                                    <div class="text-xl">Horario</div>
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('instructor.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Index instructor') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()?->rol == 3 || auth()->user()?->rol == 4)
        <div class="flex flex-col justify-between pt-4 md:w-max w-full">
            <div class="w-max flex justify-center items-center ml-2.5 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                    @if (auth()->user()?->rol == 3)
                <a href="{{ route('admin.index') }}" class="text-xl -ml-0.5 py-2 px-2 bg-gray-100 hover:bg-gray-200 rounded-md">Inicio:
                        <span class="font-bold mr-6">Admin</span>
                    @endif
                    @if (auth()->user()?->rol == 4)
                <a href="{{ route('apoyo.index') }}" class="text-xl -ml-0.5 py-2 px-2 bg-gray-100 hover:bg-gray-200 rounded-md">Inicio:
                        <span class="font-bold mr-6">Apoyo</span>
                    @endif
                </a>
                <button id="toggleSidebarSize" class="bg-gray-200 px-2 py-1 rounded-md md:block hidden">
                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="mt-2 -mr-4">
                <div class="hover:bg-gray-100 min-w-max cursor-pointer ">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth()->user()?->rol == 3)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>                                    
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Fichas</div>
                                @endif
                                @if (auth()->user()?->rol == 4)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>                                    
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Fichas</div>
                                @endif
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                        @if (auth()->user()?->rol == 3)
                            <x-dropdown-link :href="route('fichas.create')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear fichas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('fichas.importar')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Importar aprendices') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('fichas.actualizar')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Actualizar importaciones') }}
                            </x-dropdown-link>
                        @endif

                        @if (auth()->user()?->rol == 4)
                            <x-dropdown-link :href="route('fichas.create')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear fichas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('fichas.importar')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Importar aprendices') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('fichas.actualizar')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Actualizar importaciones') }}
                            </x-dropdown-link>
                        @endif
                        </x-slot>
                    </x-dropdown>
                </div>
                
                <div class="hover:bg-gray-100 min-w-max cursor-pointer ">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth()->user()?->rol == 3)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>                                  
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Aprendices</div>
                                @endif
                                @if (auth()->user()?->rol == 4)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>                                    
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Aprendices</div>
                                @endif
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                        @if (auth()->user()?->rol == 3)
                            <x-dropdown-link :href="route('aprendices.create')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear aprendiz') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('aprendices.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Gestionar aprendices') }}
                            </x-dropdown-link>
                        @endif

                        @if (auth()->user()?->rol == 4)
                            <x-dropdown-link :href="route('aprendices.create')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear aprendiz') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('aprendices.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Gestionar aprendices') }}
                            </x-dropdown-link>
                        @endif
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="hover:bg-gray-100 min-w-max cursor-pointer ">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth()->user()?->rol == 3)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>                                                                      
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Programas</div>
                                @endif
                                @if (auth()->user()?->rol == 4)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>                                                                   
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Programas</div>
                                @endif
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                        @if (auth()->user()?->rol == 3)
                        <x-dropdown-link :href="route('programas.create')" class="font-bold flex text-md items-center justify-center">
                            {{ __('Crear programas') }}
                        </x-dropdown-link>
                            <x-dropdown-link :href="route('programas.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Gestionar programas') }}
                            </x-dropdown-link>
                        @endif

                        @if (auth()->user()?->rol == 4)
                            <x-dropdown-link :href="route('programas.create')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear programas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('programas.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Gestionar programas') }}
                            </x-dropdown-link>
                        @endif
                        </x-slot>
                    </x-dropdown>
                </div>
                
                <div class="hover:bg-gray-100 min-w-max cursor-pointer">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth()->user()?->rol == 3)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Horarios</div>
                                @endif
                                @if (auth()->user()?->rol == 4)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Horarios</div>
                                @endif
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                        @if (auth()->user()?->rol == 3)
                            <x-dropdown-link :href="route('admin.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Index admin') }}
                            </x-dropdown-link>
                        @endif

                        @if (auth()->user()?->rol == 4)
                            <x-dropdown-link :href="route('apoyo.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Index apoyo') }}
                            </x-dropdown-link>
                        @endif
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="hover:bg-gray-100 min-w-max cursor-pointer">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth()->user()?->rol == 3)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>                                  
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Instructores</div>
                                @endif
                                @if (auth()->user()?->rol == 4)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-11 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                                    <div class="flex w-full items-center justify-between">  
                                        <div class="text-xl">Instructores</div>
                                @endif
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                        @if (auth()->user()?->rol == 3)
                            <x-dropdown-link :href="route('instructores.create')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear instructor') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('instructores.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Gestionar instructores') }}
                            </x-dropdown-link>
                        @endif

                        @if (auth()->user()?->rol == 4)
                            <x-dropdown-link :href="route('apoyo.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Crear instructor') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Gestionar instructores') }}
                            </x-dropdown-link>
                        @endif
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()?->rol == 5)
        <div class="flex flex-col justify-between pt-4 md:w-max w-full">
            <div class="w-max flex justify-center items-center ml-2.5 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <a href="{{ route('practica.index') }}" class="text-xl -ml-0.5 py-2 px-2 bg-gray-100 hover:bg-gray-200 rounded-md">Inicio:
                    <span class="font-bold">Practica</span>
                </a>
                <button id="toggleSidebarSize" class="bg-gray-200 px-2 py-1 rounded-md md:block hidden">
                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="mt-2 -mr-4">
                <div class="hover:bg-gray-100 min-w-max cursor-pointer ">
                    <x-dropdown align="right" width="w-full md:w-52">
                        <x-slot name="trigger">
                            <button class="flex w-full items-center gap-4 px-3 py-2 text-md leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                                </svg>                                                                   
                                <div class="flex w-full items-center justify-between">  
                                    <div class="text-xl">Practica</div>
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('practica.index')" class="font-bold flex text-md items-center justify-center">
                                {{ __('Link') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    @endif

    </div>
</aside>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarSize = document.getElementById('toggleSidebarSize');
    const toggleIcon = document.getElementById('toggleIcon');

    //Iniciamos el tamaño grande como false
    let isLargeSize = false;

    toggleSidebarSize.addEventListener('click', () => {
        isLargeSize = !isLargeSize;
        if (isLargeSize) {
            sidebar.classList.remove('md:w-16', 'overflow-hidden');
            sidebar.classList.add('md:w-72', 'overflow-auto');
            toggleIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto text-red-800">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            `;
        } else {
            sidebar.classList.remove('md:w-72', 'overflow-auto');
            sidebar.classList.add('md:w-16', 'overflow-hidden');
            toggleIcon.innerHTML = `
            <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg> 
            `;
        }
        //Guardamos el estado del tamaño del aside en el localstorage
        localStorage.setItem('isLargeSize', isLargeSize.toString());
    });

    //Cargar el estado del tamaño del aside al recargar la pagina
    window.addEventListener('load', () => {
        //Obtenemos el estado del tamaño del aside
        const savedSize = localStorage.getItem('isLargeSize');
        if (savedSize !== null) {
            //Convertimos el string del localstorage en un booleano
            isLargeSize = savedSize === 'true';
            if (isLargeSize) {
                sidebar.classList.remove('md:w-16', 'overflow-hidden');
                sidebar.classList.add('md:w-72', 'overflow-auto');
                toggleIcon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto text-red-800">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                `;
            } else {
                sidebar.classList.remove('md:w-72', 'overflow-auto');
                sidebar.classList.add('md:w-16', 'overflow-hidden');
                toggleIcon.innerHTML = `
                <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-auto">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg> 
                `;
            }
        }
    });
</script>