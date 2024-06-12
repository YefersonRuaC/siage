<x-app-layout>
    @if (session()->has('mensaje'))
        <livewire:mostrar-exito />              
    @endif
    <livewire:mostrar-aprendices />
</x-app-layout>