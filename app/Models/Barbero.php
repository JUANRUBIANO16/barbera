<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbero extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barbero';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_barbero';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'disponibilidad',
        'telefono',
        'num_doc',
        'salario',
        'edad',
        'password',
    ];

    protected $casts = [
        'telefono' => 'string',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the citas for the barbero.
     */
    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_barbero', 'id_barbero');
    }

    /**
     * Get the disponibilidades for the barbero.
     */
    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class, 'id_barbero', 'id_barbero');
    }

    /**
     * Get the usuarios for the barbero.
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_barbero', 'id_barbero');
    }
}
