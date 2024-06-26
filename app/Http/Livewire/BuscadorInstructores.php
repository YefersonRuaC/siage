<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuscadorInstructores extends Component
{
    public $idBuscar;
    public $tipoBuscar;

    public function leerDatosInstructor()
    {
        $this->emit('terminosBusqueda', $this->idBuscar, $this->tipoBuscar);
    }

    public function mount()
    {
        $this->tipoBuscar = '';
    }

    public function limpiarCampos()
    {
        $this->idBuscar = '';
        $this->tipoBuscar = '';
    }

    public function render()
    {
        return view('livewire.buscador-instructores');
    }
}
