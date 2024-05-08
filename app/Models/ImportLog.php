<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'file_name',
        'file_path',
    ];
}
