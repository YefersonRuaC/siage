<div class="bg-gray-50 rounded-md shadow-md px-4 md:px-8 py-5">
    <h1 class="font-bold text-center text-2xl text-gray-900">Editar aprendiz</h1>
    
    <div class="border-b border-gray-300 my-5"></div>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1" wire:submit.prevent='editarAprendiz'>
        
        {{-- tipo_doc --}}
        <div class="">
            <x-input-label for="tipo_doc" :value="__('Tipo de documento')" class="ml-3"/>
            <select 
                wire:model="tipo_doc" 
                id="tipo_doc" 
                class="border-gray-300 my-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
                <option value="" selected disabled>--Seleccione--</option>
                <option value="cc">CELUDA DE CIUDADANIA</option>
                <option value="ti">TARJETA DE IDENTIDAD</option>
                <option value="ce">CEDULA DE EXTRANJERIA</option>
            </select>

            @error('tipo_doc')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--id--}}
        <div>
            <x-input-label for="documento" :value="__('Numero de documento')" class="ml-3"/>
            <x-text-input 
                id="documento" 
                class="block my-1 w-full"
                type="number"
                wire:model="documento"
                :value="old('documento')"
                placeholder="Ingresé el numero de documento"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('documento')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--name--}}
        <div class="md:col-span-2">
            <x-input-label for="name" :value="__('Nombre completo')" class="ml-3"/>
            <x-text-input 
                id="name" 
                class="block my-1 w-full"
                type="text"
                wire:model="name"
                :value="old('name')"
                placeholder="Ingresé el nombre completo del aprendiz"
            />

            @error('name')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--apellidos--}}
        <div class="md:col-span-2">
            <x-input-label for="apellidos" :value="__('Apellidos completos')" class="ml-3"/>
            <x-text-input 
                id="apellidos" 
                class="block my-1 w-full"
                type="text"
                wire:model="apellidos"
                :value="old('apellidos')"
                placeholder="Ingresé los apellidos del aprendiz"
            />

            @error('apellidos')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--email--}}
        <div>
            <x-input-label for="email" :value="__('Correo electronico')" class="ml-3"/>
            <x-text-input 
                id="email" 
                class="block my-1 w-full"
                type="email"
                wire:model="email"
                :value="old('email')"
                placeholder="Ingresé el correo del aprendiz"
            />

            @error('email')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--celular--}}
        <div>
            <x-input-label for="celular" :value="__('Numero celular')" class="ml-3"/>
            <x-text-input 
                id="celular" 
                class="block my-1 w-full"
                type="number"
                wire:model="celular"
                :value="old('celular')"
                placeholder="Ingresé el numero de contacto"
            />

            @error('celular')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{-- estado --}}
        <div class="">
            <x-input-label for="estado" :value="__('Estado actual del aprendiz')" class="ml-3"/>
            <select 
                wire:model="estado" 
                id="estado" 
                class="border-gray-300 my-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
                <option value="" selected disabled>--Seleccione--</option>
                <option value="en formacion">EN FORMACION</option>
                <option value="trasladado">TRASLADADO</option>
                <option value="condicionado">CONDICIONADO</option>
                <option value="aplazado">APLAZADO</option>
                <option value="retiro voluntario">RETIRO VOLUNTARIO</option>
                <option value="cancelado">CANCELADO</option>
            </select>

            @error('estado')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{-- estado cuenta (rol) --}}
        {{-- <div>
            <x-input-label for="rol" :value="__('Estado de la cuenta del aprendiz')" class="ml-3"/>
            <select 
                wire:model="rol" 
                id="rol" 
                class="border-gray-300 my-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-sm w-full"
            >
                <option value="" selected disabled>--Seleccione--</option>
                <option value="1">ACTIVAR CUENTA</option>
                <option value="6">INHABILITAR CUENTA</option>
            </select>

            @error('rol')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div> --}}

        <div class="w-full place-items-center">
            <x-input-label for="rol" :value="__('Estado de la cuenta del aprendiz')" class="ml-3"/>
            <div class="grid grid-cols-2 gap-2 rounded-md bg-white p-1 border">
                <div>
                    <input 
                        type="radio"
                        id="activar" 
                        value="1" 
                        wire:model="rol"
                        class="peer hidden"
                    />
                    <label for="activar" class="flex justify-center gap-2 cursor-pointer select-none rounded-md p-2 text-center peer-checked:bg-green-200 peer-checked:font-bold peer-checked:text-green-600 hover:font-bold uppercase">  
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                        </svg>                           
                        activar
                    </label>
                </div>
        
                <div>
                    <input 
                        type="radio"
                        id="inhabilitar" 
                        value="6" 
                        wire:model="rol"
                        class="peer hidden"
                    />
                    <label for="inhabilitar" class="flex justify-center gap-2 cursor-pointer select-none rounded-md p-2 text-center peer-checked:bg-red-200 peer-checked:font-bold peer-checked:text-red-600 hover:font-bold uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                        </svg>                              
                        inhabilitar
                    </label>
                </div>
            </div>
        
            @error('rol')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="w-full md:col-span-2">
            <x-input-label for="ficha" :value="__('Ficha asociada')" class="mb-1 ml-3" />
            <select 
                wire:model="ficha" 
                id="ficha" 
                class="select2 w-3/4 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md"
                wire:ignore
            >
            <option value="" selected disabled>--Seleccione--</option>
            @foreach ($fichas as $ficha)
                <option value="{{ $ficha->ficha }}">{{ $ficha->ficha }} | {{ $ficha->programa }}</option>
            @endforeach
    
            </select>
            <x-input-error :messages="$errors->get('ficha')" class="mt-2" />
        </div>
        
        <div class="border-b border-gray-300 mt-5 md:col-span-2"></div>

        <x-primary-button class="w-full shadow-md mt-5 bg-blue-600 hover:bg-blue-700 md:col-span-2">
            Editar aprendiz
        </x-primary-button>
    </form>
</div>
<script>
    document.addEventListener('livewire:load', () => {
        inicializarSelect2()

        Livewire.hook('message.processed', (message, component) => {
                inicializarSelect2();
            })
    });

    function inicializarSelect2() {
        $('.select2').select2({
            placeholder: "--Seleccione--",
            allowClear: true

        }).on('change', (e) => {
            @this.set('ficha', e.target.value);
        });
    }
</script>