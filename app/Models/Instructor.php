<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    public $timestamps = false;
 
    protected $fillable = [
        'id',
        'tipo_doc',
        'name',
        'apellidos',
        'email',
        'celular',
        'direccion',
        'tipo'
    ];
}
