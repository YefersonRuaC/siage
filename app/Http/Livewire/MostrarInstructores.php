<?php

namespace App\Http\Livewire;

use App\Models\Instructor;
use App\Models\User;
use Livewire\Component;

class MostrarInstructores extends Component
{
    public $idBuscar;
    public $tipoBuscar;

    protected $listeners = [
        'eliminarInstructor',
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($idBuscar, $tipoBuscar)
    {
        $this->idBuscar = $idBuscar;
        $this->tipoBuscar = $tipoBuscar;
    }

    public function eliminarInstructor($instructorId)
    {
        // Intentamos encontrar el instructor en la tabla de instructores
        $instructor = Instructor::find($instructorId);
        
        if($instructor) {
            $user = User::find($instructorId);

            if($user) {
                $user->delete();
            }

            $instructor->delete();
        } else {
            // Si el instructor no existe en instrutores, solo intenta eliminar el usuario si existe
            $user = User::find($instructor);

            if($user) {
                $user->delete();
            }
        }
    }

    public function render()
    {
        $instructors = Instructor::when($this->idBuscar, function($query) {

            $query->where('id', 'LIKE', "%" . $this->idBuscar . "%");
        })
        ->when($this->tipoBuscar, function($query) {

            $query->where('tipo', 'LIKE', "%" . $this->tipoBuscar . "%");
        })
        ->paginate(5);

        return view('livewire.instructores.mostrar-instructores', [
            'instructors' => $instructors
        ]);
    }
}
