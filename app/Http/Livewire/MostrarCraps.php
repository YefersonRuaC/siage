<?php

namespace App\Http\Livewire;

use App\Models\Competencia;
use App\Models\Rap;
use Livewire\Component;

class MostrarCraps extends Component
{
    public $programa;

    protected $listeners = [
        'eliminarCompetencia',
        'eliminarRap'
    ];

    public function eliminarCompetencia(Competencia $competencia)
    {
        $competencia->delete();
    }

    public function eliminarRap(Rap $rap)
    {
        $rap->delete();
    }

    //Con mount tomamos el programa que es pasado por la url
    public function mount($programa)
    {
        $this->programa = $programa;
    }
    
    public function render()
    {
        //Filtramos segun el programa, mostramos sus competencias asociadas
        $competencias = Competencia::where('programa_id', $this->programa->codigo)->get();

        $programa = $this->programa;
    
        return view('livewire.craps.mostrar-craps', [
            'competencias' => $competencias,
            'programa' => $programa
        ]);
    }
}
