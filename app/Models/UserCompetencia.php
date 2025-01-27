<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCompetencia extends Model
{
    protected $fillable = ['user_id', 'competencia_id', 'nivel'];
}
