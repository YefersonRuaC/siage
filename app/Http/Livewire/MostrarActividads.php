<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Competencia;
use Livewire\Component;

class MostrarActividads extends Component
{
    public $programa;
    public $competencia;

    protected $listeners = [
        'eliminarActividad'
    ];

    public function eliminarActividad(Actividad $actividad)
    {
        $actividad->delete();
    }

    public function mount($programa)
    {
        $this->programa = $programa;
    }

    public function render()
    {
        //Filtramos actividades que tienen relacion con el modelo Competencia
        $actividades = Actividad::whereHas('competencia', function ($query) {
            //Solo incluir actividades que pertenecen al programa actual
            $query->where('programa_id', $this->programa->codigo);
        })
        //Relaciones de Actividad model
        ->with(['competencia', 'raps'])
        ->get()
        ->sortBy('trimestre')
        ->groupBy('trimestre');

        return view('livewire.actividads.mostrar-actividads', [
            'actividadesPorTrimestre' => $actividades,
            'programa' => $this->programa
        ]);
    }
}
