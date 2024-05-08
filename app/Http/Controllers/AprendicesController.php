<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ImportLog;
use Illuminate\Http\Request;
use App\Imports\AprendizImport;
use Maatwebsite\Excel\Facades\Excel;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fichas.aprendices');
    }

    public function importar(Request $request)
    {
        $request->validate([
            'documento' => ['required','file','mimes:xlsx,xls,csv','max:2048'],
        ]);

        try {

            if($request->hasFile('documento')) {
                //Obtenemos la ruta (path) del documento que el usuario subio al servidor
                $path = $request->file('documento')->getRealPath();
    
                // Verificar si el archivo ya ha sido importado
                $importLog = ImportLog::where('file_name', $request->file('documento')->getClientOriginalName())->first();
    
                if ($importLog) {
                    return back()->with('error', 'Este archivo ya ha sido importado anteriormente');
                }
    
                //Obtener la informacion que el usuario esta subiendo al importar el documento, toda es info se
                //almacena en la vrble $datos
                Excel::import(new AprendizImport(), $path);
    
                // Registrar el archivo importado en la tabla de registro
                ImportLog::create([
                    'file_name' => $request->file('documento')->getClientOriginalName(),
                    'file_path' => $request->file('documento')->getClientOriginalName(),
                ]);
    
                return back()->with('success', 'Datos importados correctamente');
            }

        //Si hay errores (el arreglo no esta vacio), mostramos la Exception lanzada desde AprendizImport.php
        //que contiene el los mensajes de error y los mostramos al admin
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('error', 'No se selecciono ningun archivo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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