<?php

namespace App\Imports;

use App\Models\Aprendiz;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AprendizImport implements ToCollection 
{
    public function collection(Collection $rows)
    {
        $errores = [];

        foreach ($rows as $index => $row) {

            if($index < 5) {
                continue;
            }

            //Si se sube otro archivo excel con un nombre distinto y se encuentra un documento o email que
            //ya existe en la BD, mostrar la alerta
            if (Aprendiz::where('documento', $row[1])->orWhere('email', $row[5])->exists()) {
                $errores[] = "El documento '{$row[1]}' o el correo electronico '{$row[5]}' ya estan registrados en el sistema.";
                continue; // Saltar este registro y pasar al siguiente
            }

            Aprendiz::create([
                'tipo_doc' => strtolower($row[0]),
                'documento' => $row[1],
                'nombre' => strtolower($row[2]),
                'apellidos' => strtolower($row[3]),
                'celular' => $row[4],
                'email' => strtolower($row[5]),
                'estado' => strtolower($row[6]),
            ]);

            // User::create([
            //     'id' => $row[1],
            //     'name' => strtolower($row[2]),
            //     'email' => strtolower($row[5]),
            //     'password' => $row[1],
            //     'rol' => 1,
            //     'apellidos' => strtolower($row[3]),
            // ]);
        }
        
        //Si el arreglo $errores esta distinto de vacio, indica que si hay errores, entonces lanzar una 
        //excepción para mostrar el mensaje al admin. (PHP_EOL) es \n el salto de linea
        if (!empty($errores)) {
            throw new \Exception(implode(PHP_EOL, $errores));
        }
    }
}