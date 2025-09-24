<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudCita extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'servicio',
        'mensaje',
        'estado',
        'leida'
    ];

    protected $casts = [
        'leida' => 'boolean',
    ];
}
