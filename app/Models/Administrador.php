<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'administrador';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
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
     * Get the usuarios for the administrador.
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_admin', 'id_admin');
    }
}
