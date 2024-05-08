<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    //Al no usar id como PK, especificamos que la llave primaria es 'ficha'
    protected $primaryKey = 'ficha';

    public $timestamps = false;

    protected $fillable = [
        'ficha',
        'programa',
        'jornada',
        'trimestre',
    ];

    //Relacionamos con la tabla 'fichas' usando la columna 'ficha'. ('ficha_id') y ('ficha') son los nombres 
    //de columnas utilizados en las relaciones entre los modelos Aprendiz y Ficha.
    // public function aprendices()
    // {
    //     //Una ficha tiene muchos aprendices
    //     return $this->hasMany(Aprendiz::class, 'ficha_id', 'ficha');
    // }
}
