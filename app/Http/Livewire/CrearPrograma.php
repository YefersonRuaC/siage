<?php

namespace App\Http\Livewire;

use App\Models\Programa;
use Livewire\Component;

class CrearPrograma extends Component
{
    public $nombre_corto;
    public $nombre_completo;

    protected $rules = [
        'nombre_corto' => ['required', 'string', 'unique:'.Programa::class],
        'nombre_completo' => ['required', 'string', 'unique:'.Programa::class],
    ];

    public function crearPrograma()
    {
        $datos = $this->validate();

        Programa::create([
            'nombre_corto' => strtoupper($datos['nombre_corto']),
            'nombre_completo' => $datos['nombre_completo'],
        ]);

        session()->flash('mensaje', 'Programa creado correctamente');

        return redirect()->route('programas.index');
    }
    public function render()
    {
        return view('livewire.crear-programa');
    }
}
