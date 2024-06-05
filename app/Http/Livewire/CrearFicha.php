<?php

namespace App\Http\Livewire;

use App\Models\Ficha;
use App\Models\Programa;
use Livewire\Component;

class CrearFicha extends Component
{
    public $ficha;
    public $programa;
    public $jornada;
    public $trimestre;

    protected $rules = [
        'ficha' => ['required', 'numeric', 'unique:'.Ficha::class],
        'programa' => ['required'],
        'jornada' => ['required', 'string', 'in:mañana,tarde,noche'],//select
        'trimestre' => ['required', 'numeric', 'in:1,2,3,4,5,6,7'],//select
    ];

    public function mount()
    {
        $this->programa = '';
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
        
        // return redirect()->route('fichas.aprendices');
        if (auth()->user()->rol == 3) {
            return redirect()->route('admin.index');
        }
        if (auth()->user()->rol == 4) {
            return redirect()->route('apoyo.index');
        }
    }

    public function render()
    {
        $programas = Programa::all();
        // dd($programas);

        return view('livewire.crear-ficha', [
            'programas' => $programas,
        ]);
    }
}
