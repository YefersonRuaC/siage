<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rap extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'rap',
        'competencia_id'
    ];

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }
}
