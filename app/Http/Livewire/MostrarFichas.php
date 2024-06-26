<?php

namespace App\Http\Livewire;

use App\Models\Ficha;
use Livewire\Component;

class MostrarFichas extends Component
{
    public $fichaBuscar;
    public $programaBuscar;
    public $jornadaBuscar;
    public $trimestreBuscar;

    protected $listeners = [
        'eliminarFicha',
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($fichaBuscar, $programaBuscar, $jornadaBuscar, $trimestreBuscar)
    {
        $this->fichaBuscar = $fichaBuscar;
        $this->programaBuscar = $programaBuscar;
        $this->jornadaBuscar = $jornadaBuscar;
        $this->trimestreBuscar = $trimestreBuscar;
    }

    public function eliminarFicha(Ficha $ficha)
    {
        $ficha->delete();
    }
    
    public function render()
    {
        $fichas = Ficha::when($this->fichaBuscar, function($query) {

            $query->where('ficha', 'LIKE', "%" . $this->fichaBuscar . "%");
        })
        ->when($this->programaBuscar, function($query) {

            $query->where('programa', 'LIKE', "%" . $this->programaBuscar . "%");
        })
        ->when($this->jornadaBuscar, function($query) {

            $query->where('jornada', 'LIKE', "%" . $this->jornadaBuscar . "%");
        })
        ->when($this->trimestreBuscar, function($query) {

            $query->where('trimestre', 'LIKE', "%" . $this->trimestreBuscar . "%");
        })
        ->orderBy('created_at', 'desc')->paginate(2);
        
        return view('livewire.mostrar-fichas', [
            'fichas' => $fichas
        ]);
    }
}
