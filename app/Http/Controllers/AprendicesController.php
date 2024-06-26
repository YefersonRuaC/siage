<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;
use App\Imports\AprendizImport;
use App\Models\Aprendiz;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class AprendicesController extends Controller
{
    public $ficha_id;
    public $ficha;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichas = Ficha::all();
        // dd($fichas);

        return view('fichas.importar', [
            'fichas' => $fichas
        ]);
    }

    public function actualizar()
    {
        $fichas = Ficha::all();
        // $ficha = Ficha::findOrFail($ficha_id);
        // dd($fichas);

        return view('fichas.actualizar', [
            'fichas' => $fichas
        ]);
    }
    

    public function importar(Request $request)
    {
        $request->validate([
            'documento' => ['required','file','mimes:xlsx,xls,csv','max:2048'],
            'ficha' => ['required'],
        ]);

        try {
            // Obtener la ficha seleccionada
            $ficha = Ficha::findOrFail($request->input('ficha'));
    
            if ($request->hasFile('documento')) {
                // Guardar el archivo subido en el almacenamiento
                $path = $request->file('documento')->store('imports');
    
                // Obtener la ruta completa del archivo almacenado
                $fullPath = storage_path('app/' . $path);
    
                // Importar el archivo sin especificar el tipo
                Excel::import(new AprendizImport($ficha), $fullPath);
    
                session()->flash('mensaje', 'Datos importados correctamente');
    
                if (auth()->user()->rol == 3) {
                    return redirect()->route('admin.index');
                }
                if (auth()->user()->rol == 4) {
                    return redirect()->route('apoyo.index');
                }
            }
    
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('error', 'No se selecciono ningun archivo');
    }

    /**
     * Display a listing of the resource.
     */
    public function inicio()
    {
        return view('aprendices.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aprendiz $aprendiz, User $user)
    {
        return view('aprendices.edit', [
            'aprendiz' => $aprendiz
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
