<?php

namespace App\Http\Livewire;

use App\Models\Ficha;
use Livewire\Component;
use App\Models\Programa;
use Illuminate\Validation\Rule;

class EditarFicha extends Component
{
    public $ficha_id;
    public $ficha;
    public $programa;
    public $jornada;
    public $trimestre;

    public function rules()
    {
        return [
            'ficha' => ['required', 'numeric', Rule::unique('fichas', 'ficha')->ignore($this->ficha_id, 'ficha')],
            'programa' => ['required'],
            'jornada' => ['required', 'string', 'in:mañana,tarde,noche'],
            'trimestre' => ['required', 'numeric', 'in:1,2,3,4,5,6,7'],
        ];
    }

    public function mount(Ficha $ficha) 
    {
        $this->ficha_id = $ficha->ficha;
        $this->ficha = $ficha->ficha;
        $this->programa = $ficha->programa;
        $this->jornada = $ficha->jornada;
        $this->trimestre = $ficha->trimestre;
    }

    public function editarFicha()
    {
        $datos = $this->validate();

        //Encontramos la ficha a editar
        $ficha = Ficha::find($this->ficha_id);

        $ficha->ficha = $datos['ficha'];
        $ficha->programa = $datos['programa'];
        $ficha->jornada = $datos['jornada'];
        $ficha->trimestre = $datos['trimestre'];

        $ficha->save();

        session()->flash('mensaje', 'Ficha actualizada correctamente');
        
        if(auth()->user()->rol == 3) {
            return redirect()->route('admin.index');
        }

        if(auth()->user()->rol == 4) {
            return redirect()->route('apoyo.index');
        }
    }

    public function render()
    {
        $programas = Programa::all();

        return view('livewire.editar-ficha', [
            'programas' => $programas
        ]);
    }
}
