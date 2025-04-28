<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    protected $table = 'lector';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'direccion',
        'telefono',
    ];
}

