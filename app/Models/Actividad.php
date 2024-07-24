<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'nombre_corto',
        'nombre_completo',
        'trimestre',
        'competencia_id',
    ];

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }

    public function raps()
    {
        return $this->belongsToMany(Rap::class, 'actividad_rap');
    }
}
