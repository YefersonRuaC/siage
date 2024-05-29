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
        $programas = Programa::orderBy('created_at', 'desc')->paginate(2);
        // dd($programas);

        return view('livewire.mostrar-programas', [
            'programas' => $programas
        ]);
    }
}
