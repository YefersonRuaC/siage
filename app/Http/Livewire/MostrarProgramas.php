<?php

namespace App\Http\Livewire;

use App\Models\Programa;
use Livewire\Component;

class MostrarProgramas extends Component
{
    protected $listeners = ['eliminarPrograma'];

    public function eliminarPrograma(Programa $programa)
    {
        $programa->delete();
    }
    
    public function render()
    {
        $programas = Programa::orderBy('created_at', 'desc')->paginate(3);
        // dd($programas);

        return view('livewire.programas.mostrar-programas', [
            'programas' => $programas
        ]);
    }
}
