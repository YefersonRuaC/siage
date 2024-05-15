<?php

namespace App\Http\Livewire;

use App\Models\Ficha;
use Livewire\Component;

class CrearFicha extends Component
{
    public $ficha;
    public $programa;
    public $jornada;
    public $trimestre;

    protected $rules = [
        'ficha' => ['required', 'numeric', 'unique:'.Ficha::class],
        'programa' => ['required', 'string'],
        'jornada' => ['required', 'string', 'in:mañana,tarde,noche'],//select
        'trimestre' => ['required', 'numeric', 'in:1,2,3,4,5,6,7'],//select
    ];

    public function mount()
    {
        // $this->programa = '';
        $this->jornada = '';
        $this->trimestre = '';
    }

    public function crearFicha()
    { 
        $datos = $this->validate();

        Ficha::create([
            //'ficha' campo de la BD y fillable de Ficha.php. $datos['ficha'] datos ingresados en los inputs
            'ficha' => $datos['ficha'],
            'programa' => $datos['programa'],
            'jornada' => $datos['jornada'],
            'trimestre' => $datos['trimestre'],
        ]);

        session()->flash('mensaje', 'Ficha creada correctamente');
        
        return redirect()->route('fichas.aprendices');
    }

    public function render()
    {
        return view('livewire.crear-ficha');
    }
}
