<?php

namespace App\Http\Livewire;

use App\Models\Programa;
use Livewire\Component;

class CrearPrograma extends Component
{
    public $codigo;
    public $nombre_corto;
    public $nombre_completo;
    public $trimestres;

    protected $rules = [
        'codigo' => ['required', 'string', 'unique:'.Programa::class],
        'nombre_corto' => ['required', 'string', 'unique:'.Programa::class],
        'nombre_completo' => ['required', 'string', 'unique:'.Programa::class],
        'trimestres' => ['required', 'numeric']
    ];

    public function crearPrograma()
    {
        $datos = $this->validate();

        Programa::create([
            'codigo' => $datos['codigo'],
            'nombre_corto' => strtoupper($datos['nombre_corto']),
            'nombre_completo' => $datos['nombre_completo'],
            'trimestres' => $datos['trimestres'],
        ]);

        session()->flash('mensaje', 'Programa creado correctamente');

        return redirect()->route('programas.index');
    }
    public function render()
    {
        return view('livewire.programas.crear-programa');
    }
}
