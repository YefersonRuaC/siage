<?php

namespace App\Http\Livewire;

use App\Models\Programa;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditarPrograma extends Component
{
    public $programa_id;
    public $nombre_corto;
    public $nombre_completo;

    public function rules()
    {
        return [
            'nombre_corto' => ['required', 'string',  Rule::unique('programas', 'nombre_corto')->ignore($this->programa_id, 'programa')],
            'nombre_completo' => ['required', 'string',  Rule::unique('programas', 'nombre_completo')->ignore($this->programa_id, 'programa')],
        ];
    }

    public function mount(Programa $programa)
    {
        $this->programa_id = $programa->programa;
        $this->nombre_corto = $programa->nombre_corto;
        $this->nombre_completo = $programa->nombre_completo;
    }

    public function editarPrograma()
    {
        $datos = $this->validate();

        //Seleccionamos el programa a editar
        $programa = Programa::find($this->programa_id);

        $programa->nombre_corto = strtoupper($datos['nombre_corto']);
        $programa->nombre_completo = $datos['nombre_completo'];

        $programa->save();

        session()->flash('mensaje', 'Programa de formación actualizado correctamente');

        return redirect()->route('programas.index');
    }

    public function render()
    {
        return view('livewire.editar-programa');
    }
}
