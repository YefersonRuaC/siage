<?php

namespace App\Imports;

use App\Models\Aprendiz;
use App\Models\Ficha;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpParser\Node\Stmt\Else_;

// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AprendizImport implements ToCollection 
{
    protected $ficha;

    public function __construct(Ficha $ficha)
    {
        $this->ficha = $ficha;
    }

    public function collection(Collection $rows)
    {
        $errores = [];

        foreach ($rows as $index => $row) {

            if($index < 5) {
                continue;
            }

            if (strtolower($row[6]) === 'trasladado') {
                continue;

            //Identificamos el aprendiz por medio de su documento
            } elseif ($aprendiz = Aprendiz::where('id', strtolower($row[1]))->first()) {
                
                //Si el aprendiz existe en la ficha asociada, lo actualizamos 
                $aprendiz->update([
                    'tipo_doc' => strtolower($row[0]),
                    'id' => $row[1],
                    'nombre' => strtolower($row[2]),
                    'apellidos' => strtolower($row[3]),
                    'celular' => $row[4],
                    'email' => strtolower($row[5]),
                    'estado' => strtolower($row[6]),
                    'ficha_id' => $this->ficha->ficha,
                ]);
            
            } else {
                Aprendiz::create([
                    'tipo_doc' => strtolower($row[0]),
                    'id' => $row[1],
                    'nombre' => strtolower($row[2]),
                    'apellidos' => strtolower($row[3]),
                    'celular' => $row[4],
                    'email' => strtolower($row[5]),
                    'estado' => strtolower($row[6]),
                    'ficha_id' => $this->ficha->ficha,
                ]);
            }

            
            //Solo crearemos cuentas (ACTIVAS, rol=1) si el aprendiz esta 'en formacion'
            if (strtolower($row[6]) === 'en formacion' || strtolower($row[6]) === 'condicionado') {
                // Buscar si el usuario ya existe por su email
                $user = User::where('email', strtolower($row[5]))->first();
            
                //Si $user es true (si esta ese email en la BD), lo actualiza
                if ($user) {
                    //Si el usuario existe actualizamos sus datos
                    $user->update([
                        'id' => $row[1], //Actualizamos tambien el id (documento) por si es necesario
                        'name' => strtolower($row[2]),
                        'password' => $row[1],
                        'rol' => 1,
                        'apellidos' => strtolower($row[3]),
                    ]);

                //Si $user es false (no esta el email en la BD)
                } else {
                    //Creamos el usuario, ya que no existe en la BD
                    User::create([
                        'id' => $row[1],
                        'name' => strtolower($row[2]),
                        'email' => strtolower($row[5]),
                        'password' => $row[1],
                        'rol' => 1,
                        'apellidos' => strtolower($row[3]),
                    ]);
                }

            //Si el aprendiz esta 'trasladado', no creamos su cuenta (ya que en otra ficha ya esta 
            //'en formacion') y en esa ficha donde esta en formacion es donde le crearon su cuenta
            } elseif (strtolower($row[6]) === 'trasladado') {
                continue;

            //Si el aprendiz no esta en 'en formacion' ni en 'trasladado'
            } else {
                //Buscar si el usuario ya existe por el email
                $user = User::where('email', strtolower($row[5]))->first();

            //Si $user es true (ya existe ese usuario en la BD) le actualizamos su estado a inhabilitado (rol=6)
                if($user) {
                    $user->update([
                        'id' => $row[1],
                        'name' => strtolower($row[2]),
                        'email' => strtolower($row[5]),
                        'password' => $row[1],
                        'rol' => 6,
                        'apellidos' => strtolower($row[3]),
                    ]);
                }
            }
        }
        
        //Si el arreglo $errores esta distinto de vacio, indica que si hay errores, entonces lanzar una 
        //excepción para mostrar el mensaje al admin. (PHP_EOL) es \n el salto de linea
        if (!empty($errores)) {
            throw new \Exception(implode(PHP_EOL, $errores));
        }
    }
}