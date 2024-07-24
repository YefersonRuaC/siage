<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo';
    public $incrementing = false; //Desactivar autoIncrement
    protected $keyType = 'string';

    // public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre_corto',
        'nombre_completo',
        'trimestres'
    ];

    public function competencias()
    {
        return $this->hasMany(Competencia::class);
    }
}
