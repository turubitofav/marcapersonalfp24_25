<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'direccion',
        'votos',
        'ciclo',
    ];
}
