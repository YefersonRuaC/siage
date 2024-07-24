<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Ficha;
use Livewire\Component;
use App\Models\Aprendiz;
use Illuminate\Validation\Rule;

class EditarAprendiz extends Component
{
    public $aprendiz_id;
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
            'documento' => ['required', Rule::unique('users', 'id')->ignore($this->aprendiz_id, 'id')],
            'tipo_doc' => ['required', 'in:cc,ti,ce'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->aprendiz_id, 'id')],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'numeric', 'digits_between:7,10'],
            'estado' => ['required'],
            'rol' => ['required', 'in:1,6'],
            'ficha' => ['required']
        ];
    }

    public function mount(Aprendiz $aprendiz)
    {
        $this->aprendiz_id = $aprendiz->id;
        $this->documento = $aprendiz->id;
        $this->tipo_doc = $aprendiz->tipo_doc;
        $this->name = $aprendiz->name;
        $this->email = $aprendiz->email;
        $this->apellidos = $aprendiz->apellidos;
        $this->celular = $aprendiz->celular;
        $this->estado = $aprendiz->estado;
        $this->ficha = $aprendiz->ficha_id;

        $user = User::find($this->aprendiz_id);
        if($user) {
            $this->rol = $user->rol;
        }
    }

    public function editarAprendiz()
    {
        $datos = $this->validate();
        //Buscamos el aprendiz por su id en aprendices
        $aprendiz = Aprendiz::find($this->aprendiz_id);

        if($aprendiz) {

            $user = User::find($this->aprendiz_id);
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

            $aprendiz->update([
                'id' => $datos['documento'],
                'tipo_doc' => $datos['tipo_doc'],
                'name' => $datos['name'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'celular' => $datos['celular'],
                'estado' => $datos['estado'],
                'ficha_id' => $datos['ficha']
            ]);
            
            session()->flash('mensaje', 'Aprendiz actualizado correctamente');    
        }

        return redirect()->route('aprendices.index');
    }

    public function render()
    {
        $fichas = Ficha::all();
        
        return view('livewire.aprendices.editar-aprendiz', [
            'fichas' => $fichas    
        ]);
    }
}
