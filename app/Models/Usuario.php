<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_clie',
        'id_admin',
        'id_barbero',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the cliente that owns the usuario.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clie', 'id_clie');
    }

    /**
     * Get the administrador that owns the usuario.
     */
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_admin', 'id_admin');
    }

    /**
     * Get the barbero that owns the usuario.
     */
    public function barbero()
    {
        return $this->belongsTo(Barbero::class, 'id_barbero', 'id_barbero');
    }
}
