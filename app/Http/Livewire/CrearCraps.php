<?php

namespace App\Http\Livewire;

use App\Models\Competencia;
use Livewire\Component;

class CrearCraps extends Component
{
    public $competencia;
    public $programa;
    public $raps = [];
    public $competencia_id;
    public $isEditMode = false;

    protected $rules = [
        'competencia' => ['required', 'string'],
        'raps.*' => ['required', 'string']
    ];

    protected $listeners = [
        'cargarCompetencia',
        'volverCrear'
    ];

    public function mount($programa)
    {
        $this->programa = $programa;
        $this->raps[] = '';//Inicializamos el array de raps con un elemento vacio para tener el input inicial
    }

    public function agregarRap()
    {
        $this->raps[] = '';
    }

    public function removerRap($index)
    {
        //Especificamos el $index y con unset removemos el rap que corresponda a ese indice
        unset($this->raps[$index]);
        //Con array_values, reindexamos los campos de rap que nos quedan en el array de raps ($this->raps) 
        $this->raps = array_values($this->raps);
    } 

    public function crearCompetencia()
    {
        $datos = $this->validate();

        if($this->isEditMode) {
            $competencia = Competencia::find($this->competencia_id);//Encontramos la competencia a editar

            $competencia->update([
                'competencia' => $datos['competencia'],
                'programa_id' => $this->programa->codigo
            ]);

            //Eliminamos los raps asociados a la competencia actual, evitando que al actualizar queden
            //raps antiguos asociados a la competencia
            $competencia->raps()->delete();

            //Creamos los raps basados en los datos actuales (actualizamos)
            foreach($this->raps as $rap) {
                $competencia->raps()->create([
                    'rap' => $rap
                ]);
            }

            session()->flash('mensaje', 'Competencia actualizada correctamente');

        } else {
            $competencia = Competencia::create([
                'competencia' => $datos['competencia'],
                'programa_id' => $this->programa->codigo
            ]);
    
            //$this->raps: es el array que contiene los raps  que el usuario ha inidicado. Los recorremos
            foreach ($this->raps as $rap) {//$rap: en cada iteracion queda con el valor de un elemento del array 
                $competencia->raps()->create([
                    //Segun el numero de iteraciones creamos los distintos rap, y con la instacia de $competencia
                    'rap' => $rap//y la relacion en el modelo (raps) tenemos la referencia a que competencia
                    //pertenece el rap
                ]);
            }
    
            session()->flash('mensaje', 'Competencia creada correctamente');    
        }

        return redirect()->route('craps.craps', $this->programa->codigo);
    }

    public function cargarCompetencia($id)
    {
        //Encontramos la competencia y sus raps asociados por medio del id
        $competencia = Competencia::with('raps')->find($id);

        $this->competencia = $competencia->competencia;
        //Con la relacion de competencia y raps, tomamos de la db cada uno de los valores de rap en raps
        $this->raps = $competencia->raps->pluck('rap')->toArray();
        $this->competencia_id = $competencia->id;

        $this->isEditMode = true;
    }

    public function volverCrear()
    {
        $this->competencia = '';
        $this->raps = [''];
        $this->competencia_id = '';

        $this->isEditMode = false;
    }

    public function render()
    {
        return view('livewire.craps.crear-craps');
    }
}
