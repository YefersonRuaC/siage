<x-app-layout>
    @if (session()->has('mensaje'))
        <livewire:mostrar-exito />              
    @endif
    <livewire:mostrar-fichas />
</x-app-layout>