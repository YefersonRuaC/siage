<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    use HasFactory;
    //Al no usar id como PK, especificamos que la llave primaria es 'documento'
    // protected $primaryKey = 'documento';

    public $timestamps = false;

    protected $fillable = [
        // 'documento',
        'id',
        'tipo_doc',
        'nombre',
        'apellidos',
        'celular',
        'email',
        'estado',
        'ficha_id',
    ];

    //Relacionamos con la tabla 'fichas' usando la columna 'ficha'. ('ficha_id') y ('ficha') son los nombres 
    //de columnas utilizados en las relaciones entre los modelos Aprendiz y Ficha.
    // public function ficha()
    // {
    //  // Aprendices pertenecen a una ficha
    //     return $this->belongsTo(Ficha::class, 'ficha_id', 'ficha');
    // }
}
