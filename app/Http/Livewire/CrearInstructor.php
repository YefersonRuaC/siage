<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Instructor;
use Illuminate\Validation\Rule;

class CrearInstructor extends Component
{ 
    public $documento;
    public $tipo_doc;
    public $name;
    public $apellidos;
    public $email;
    public $celular;
    public $direccion;
    public $tipo;
    public $rol;

    public function rules()
    {
        return [
            'documento' => ['required', Rule::unique(User::class, 'id')],
            'tipo_doc' => ['required', 'in:cc,ti,ce'],//select
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'numeric', 'digits_between:7,10'],
            'direccion' => ['required'],
            'tipo' => ['required'],//select
            'rol' => ['required', 'in:2,6']
        ];
    }

    public function mount()
    {
        $this->tipo_doc = '';
        $this->tipo = '';
        $this->rol = '';
    }

    public function crearInstructor()
    {
        $datos = $this->validate();

        Instructor::create([
            'id' => $datos['documento'],
            'tipo_doc' => $datos['tipo_doc'],
            'name' => $datos['name'],
            'apellidos' => $datos['apellidos'],
            'email' => $datos['email'],
            'celular' => $datos['celular'],
            'direccion' => $datos['direccion'],
            'tipo' => $datos['tipo']
        ]);

        User::create([
            'id' => $datos['documento'],
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => $datos['documento'],
            'rol' => $datos['rol'],
            // 'rol' => 2,
            'apellidos' => $datos['apellidos'],
        ]);

        session()->flash('mensaje', 'Instructor creado correctamente');

        return redirect()->route('instructores.index');
    }

    public function render()
    {
        return view('livewire.crear-instructor');
    }
}
