<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Aprendiz;

class MostrarAprendices extends Component
{
    public $idBuscar;
    public $fichaBuscar;
    public $estadoBuscar;

    protected $listeners = [
        'eliminarAprendiz',
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($idBuscar, $fichaBuscar, $estadoBuscar)
    {
        $this->idBuscar = $idBuscar;
        $this->fichaBuscar = $fichaBuscar;
        $this->estadoBuscar = $estadoBuscar;
    }

    public function eliminarAprendiz($aprendizId)
    {
        // Intentamos encontrar el aprendiz en la tabla de aprendices
        $aprendiz = Aprendiz::find($aprendizId);

        if($aprendiz) {
            // Si el aprendiz esta en aprendices, intentamos encontrarlo en users
            $user = User::find($aprendizId);

            if($user) {
                $user->delete();
            }

            $aprendiz->delete();
        } else {
            // Si el aprendiz no existe en aprendices, solo intenta eliminar el usuario si existe
            $user = User::find($aprendizId);

            if($user) {
                // Si el usuario existe en users
                $user->delete();
            }
        }
    }

    public function render()
    {
        $aprendizs = Aprendiz::when($this->idBuscar, function($query) {

            $query->where('id', 'LIKE', "%" . $this->idBuscar . "%");
        })
        ->when($this->fichaBuscar, function($query) {

            $query->where('ficha_id', 'LIKE', "%" . $this->fichaBuscar . "%");
        })
        ->when($this->estadoBuscar, function($query) {

            $query->where('estado', 'LIKE', "%" . $this->estadoBuscar . "%");
        })
        ->paginate(6);

        return view('livewire.aprendices.mostrar-aprendices', [
            'aprendizs' => $aprendizs
        ]);
    }
}
