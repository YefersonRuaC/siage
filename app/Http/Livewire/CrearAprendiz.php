<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Ficha;
use Livewire\Component;
use App\Models\Aprendiz;
use Illuminate\Validation\Rule;

class CrearAprendiz extends Component
{
    public $documento;
    public $name;
    public $email;
    public $password;
    public $rol;
    public $apellidos;
    public $tipo_doc;
    public $celular;
    public $estado;
    public $ficha;

    public function rules()
    {
        return [
            'documento' => ['required', Rule::unique(User::class, 'id')],
            'tipo_doc' => ['required', 'in:cc,ti,ce'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'numeric', 'digits_between:7,10'],
            'estado' => ['required'],
            'rol' => ['required', 'in:1,6'],
            'ficha' => ['required']
        ];
    }

    public function mount() 
    {   
        $this->tipo_doc = '';
        $this->estado = '';
        $this->rol = '';
        $this->ficha = '';
    }

    public function crearAprendiz()
    {
        $datos = $this->validate();

        Aprendiz::create([
            'id' => $datos['documento'],
            'tipo_doc' => $datos['tipo_doc'],
            'name' => $datos['name'],
            'apellidos' => $datos['apellidos'],
            'email' => $datos['email'],
            'celular' => $datos['celular'],
            'estado' => $datos['estado'],
            // 'estado' => 'en formacion',
            'ficha_id' => $datos['ficha']
        ]);

        // if($datos['estado'] == 'en formacion') {
            User::create([
                'id' => $datos['documento'],
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => $datos['documento'],
                'rol' => $datos['rol'],
                // 'rol' => 1,
                'apellidos' => $datos['apellidos'],
            ]);
        // } else {
            
            // User::create([
            //     'id' => $datos['documento'],
            //     'name' => $datos['name'],
            //     'email' => $datos['email'],
            //     'password' => $datos['documento'],
            //     'rol' => 6,
            //     'apellidos' => $datos['apellidos'],
            // ]);
        // }
        
        session()->flash('mensaje', 'Aprendiz creado correctamente');

        return redirect()->route('aprendices.index');
    }

    public function render()
    {
        $fichas = Ficha::all();

        return view('livewire.crear-aprendiz', [
            'fichas' => $fichas
        ]);
    }
}
