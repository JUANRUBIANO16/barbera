<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_clie';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'correo',
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
     * Get the citas for the cliente.
     */
    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_clie', 'id_clie');
    }

    /**
     * Get the ventas for the cliente.
     */
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_clie', 'id_clie');
    }

    /**
     * Get the usuarios for the cliente.
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_clie', 'id_clie');
    }
}
