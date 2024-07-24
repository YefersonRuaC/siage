<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Rap;
use Livewire\Component;
use App\Models\Competencia;
use Illuminate\Http\Request;

class CrearActividads extends Component
{
    public $actividad;
    public $programa;
    public $nombre_corto;
    public $nombre_completo;
    public $trimestre;
    public $competencia_id;
    public $actividad_id;
    public $raps = [];
    public $selectedRaps = [];
    public $isEditMode = false;

    protected $rules = [
        'nombre_corto' => ['required', 'string'],
        'nombre_completo' => ['required', 'string'],
        'trimestre' => ['required', 'numeric'],
        'competencia_id' => ['required'],
        'selectedRaps' => ['array'],
        'selectedRaps.*' => ['exists:raps,id']
    ];

    protected $listeners = [
        'cargarActividad',
        'volverCrear'
    ];

    public function mount($programa)
    {
        $this->programa = $programa;
        $this->competencia_id = '';
        $this->selectedRaps = [];
    }

    //Cuando competencia_id es seleccionada en el input, este metodo trae los raps que tienen asociados esa competencia_id
    public function updatedCompetenciaId($value)
    {
        //Obtenemos los raps segun la competencia_id seleccionada
        $this->raps = Rap::where('competencia_id', $value)->get();

        if ($this->isEditMode) {
            //Actualizamos los selectedRaps para incluir los raps seleccionados de esa competencia
            $actividad = Actividad::with('raps')->find($this->actividad_id);
            $this->selectedRaps = $actividad->raps->pluck('id')->toArray();
        }
    }

    public function crearActividad()
    {
        $datos = $this->validate();

        if($this->isEditMode) {
            $actividad = Actividad::find($this->actividad_id);
            // dd($actividad);
            $actividad->update([
                'nombre_corto' => $datos['nombre_corto'],
                'nombre_completo' => $datos['nombre_completo'],
                'trimestre' => $datos['trimestre'],
                'competencia_id' => $datos['competencia_id']
            ]);

            // Sincronizar los raps si hay seleccionados
            $actividad->raps()->sync($datos['selectedRaps']);

            session()->flash('mensaje', 'Actividad de aprendizaje actualizada correctamente');

        } else {
            $actividad = Actividad::create([
                'nombre_corto' => $datos['nombre_corto'],
                'nombre_completo' => $datos['nombre_completo'],
                'trimestre' => $datos['trimestre'],
                'competencia_id' => $datos['competencia_id']
            ]);
    
            //Sincronizar los raps si hay seleccionados
            if (!empty($datos['selectedRaps'])) {
                //Obtenemos la relacion entre la actividad y los raps. sync acepta un arreglo de id's (id de los
                //raps seleccionados). Asi estos id's estaran asociados y sincronizados con la actividd en la 
                //tabla pivote 'actividad_rap'
                $actividad->raps()->sync($datos['selectedRaps']);
            }
    
            session()->flash('mensaje', 'Actividad de aprendizaje creada correctamente');
        }
        return redirect()->route('actividads.actividads', $this->programa->codigo);
    }

    public function cargarActividad($id)
    {
        $actividad = Actividad::with('raps')->find($id);
        // dd($actividad);
        $this->nombre_corto = $actividad->nombre_corto;
        $this->nombre_completo = $actividad->nombre_completo;
        $this->trimestre = $actividad->trimestre;
        $this->competencia_id = $actividad->competencia_id;
        $this->selectedRaps = $actividad->raps->pluck('id')->toArray();
        // dd($this->raps);
        $this->actividad_id = $actividad->id;

        $this->isEditMode = true;
        // Cargar los RAPs de la competencia seleccionada
        $this->raps = Rap::where('competencia_id', $actividad->competencia_id)->get();
    }

    public function volverCrear()
    {
        $this->nombre_corto = '';
        $this->nombre_completo = '';
        $this->trimestre = '';
        $this->competencia_id = '';
        $this->selectedRaps = [];
        $this->actividad_id = '';
        $this->raps = [];

        $this->isEditMode = false;
    }

    public function render()
    {
        $competencias = Competencia::all();
        // dd($competencias);

        return view('livewire.actividads.crear-actividads', [
            'competencias' => $competencias,
            'raps' => $this->raps//Pasamos los raps que sera recorridos y van variando segun la competencia_id
        ]);
    }
}
