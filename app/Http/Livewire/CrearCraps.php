<?php

namespace App\Http\Livewire;

use App\Models\Competencia;
use Livewire\Component;

class CrearCraps extends Component
{
    public $competencia;
    public $programa;
    public $raps = [];//Iniciando raps como un array vacio

    protected $rules = [
        'competencia' => ['required', 'string'],
        'raps.*' => ['required', 'string']
    ];

    public function mount($programa)
    {
        $this->programa = $programa;
        $this->raps[] = '';//Inicializamos el array de raps con un elemento vacio para tener el input inicial
    }

    public function agregarRap()
    {
        $this->raps[] = '';//Agregar mas inputs vacio (inicialmente) segun el usuario requiera
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

        return redirect()->route('craps.craps', $this->programa->codigo);
    }

    public function render()
    {
        return view('livewire.crear-craps');
    }
}
