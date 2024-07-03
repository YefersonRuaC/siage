<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'competencia',
        'programa_id'
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programa_id');
    }

    public function raps()
    {
        return $this->hasMany(Rap::class);
    }
}
