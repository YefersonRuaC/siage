<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use Livewire\Component;

class MostrarRuta extends Component
{
    public $programa;

    public function render()
    {
        $actividades = Actividad::whereHas('competencia', function ($query) {
            //Solo incluir actividades que pertenecen al programa actual
            $query->where('programa_id', $this->programa->codigo);
        })
        //Relaciones de Actividad model
        ->with(['competencia', 'raps'])
        ->get()
        ->sortBy('trimestre')
        ->groupBy('trimestre');
        // dd($actividades);

        return view('livewire.actividads.mostrar-ruta', [
            'actividadesPorTrimestre' => $actividades
        ]);
    }
}
