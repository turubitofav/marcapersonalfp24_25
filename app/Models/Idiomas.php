<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alpha2',
        'alpha3t',
        'alpha3b',
        'english_name',
        'native_name'
    ];

    public static $filterColumns = ['alpha2', 'alpha3t', 'alpha3b', 'english_name', 'native_name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_idiomas', 'idioma_id', 'user_id')
            ->withPivot('nivel', 'certificado');
    }
}
