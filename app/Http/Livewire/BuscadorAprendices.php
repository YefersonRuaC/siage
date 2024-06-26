<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuscadorAprendices extends Component
{
    public $idBuscar;
    public $fichaBuscar;
    public $estadoBuscar;

    public function leerDatosAprendiz()
    {
        $this->emit('terminosBusqueda', $this->idBuscar, $this->fichaBuscar, $this->estadoBuscar);
    }

    public function mount()
    {
        $this->estadoBuscar = '';
    }

    public function limpiarCampos()
    {
        $this->idBuscar = '';
        $this->fichaBuscar = '';
        $this->estadoBuscar = '';
    }

    public function render()
    {
        return view('livewire.buscador-aprendices');
    }
}
