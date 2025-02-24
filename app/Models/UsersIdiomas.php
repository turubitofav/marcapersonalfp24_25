<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersIdiomas extends Model
{
    use HasFactory;

    protected $table = 'user_idiomas';

    protected $fillable = [
        'user_id',
        'idioma_id',
        'nivel',
        'certificado'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function idioma()
    {
        return $this->belongsTo(Idiomas::class);
    }
}
