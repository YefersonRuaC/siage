<?php

namespace App\Http\Livewire;

use App\Models\Programa;
use Livewire\Component;

class BuscadorFichas extends Component
{
    public $fichaBuscar;
    public $programaBuscar;
    public $jornadaBuscar;
    public $trimestreBuscar;

    public function leerDatosFicha()
    {
        $this->emit('terminosBusqueda', $this->fichaBuscar, $this->programaBuscar, $this->jornadaBuscar, $this->trimestreBuscar);
    }

    public function mount()
    {
        $this->jornadaBuscar = '';
        $this->trimestreBuscar = '';
    }

    public function limpiarCampos()
    {
        $this->fichaBuscar = '';
        $this->programaBuscar = '';
        $this->jornadaBuscar = '';
        $this->trimestreBuscar = '';
    }

    public function render()
    {
        return view('livewire.buscador-fichas');
    }
}
