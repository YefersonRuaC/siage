<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $primaryKey = 'programa';

    // public $timestamps = false;

    protected $fillable = [
        'programa',
        'nombre_corto',
        'nombre_completo',
    ];
}
