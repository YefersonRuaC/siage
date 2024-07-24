<?php

namespace App\Http\Livewire;

use App\Models\Instructor;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditarInstructor extends Component
{
    public $instructor_id;
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
            'documento' => ['required', Rule::unique('users', 'id')->ignore($this->instructor_id, 'id')],
            'tipo_doc' => ['required', 'in:cc,ti,ce'],//select
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->instructor_id, 'id')],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'numeric', 'digits_between:7,10'],
            'direccion' => ['required'],
            'tipo' => ['required'],//select
            'rol' => ['required', 'in:2,6']
        ];
    }

    public function mount(Instructor $instructor)
    {
        $this->instructor_id = $instructor->id;
        $this->documento = $instructor->id;
        $this->tipo_doc = $instructor->tipo_doc;
        $this->name = $instructor->name;
        $this->email = $instructor->email;
        $this->apellidos = $instructor->apellidos;
        $this->celular = $instructor->celular;
        $this->direccion = $instructor->direccion;
        $this->tipo = $instructor->tipo;

        $user = User::find($this->instructor_id);
        if($user) {
            $this->rol = $user->rol;
        }
    }

    public function editarInstructor()
    {
        $datos = $this->validate();

        $instructor = Instructor::find($this->instructor_id);

        if($instructor) {

            $user = User::find($this->instructor_id);
            if($user) {
                $user->update([
                    'id' => $datos['documento'],
                    'name' => $datos['name'],
                    'email' => $datos['email'],
                    'password' => $user->password,
                    'rol' => $datos['rol'],
                    'apellidos' => $datos['apellidos'],
                ]);
            } else {
                User::create([
                    'id' => $datos['documento'],
                    'name' => $datos['name'],
                    'email' => $datos['email'],
                    'password' => $datos['documento'],
                    'rol' => $datos['rol'],
                    'apellidos' => $datos['apellidos'],
                ]);
            }

            $instructor->update([
                'id' => $datos['documento'],
                'tipo_doc' => $datos['tipo_doc'],
                'name' => $datos['name'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'celular' => $datos['celular'],
                'direccion' => $datos['direccion'],
                'tipo' => $datos['tipo']
            ]);

            session()->flash('mensaje', 'Instructor actualizado correctamente');    
        }

        return redirect()->route('instructores.index');
    }

    public function render()
    {
        return view('livewire.instructores.editar-instructor');
    }
}
