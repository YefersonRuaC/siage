<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarExito extends Component
{
    public $message;
    
    public function render()
    {
        return view('livewire.mostrar-exito');
    }
}
