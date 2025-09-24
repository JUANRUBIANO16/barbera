<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cita';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_cita';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'descripcion',
        'id_clie',
        'id_barbero',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the cliente that owns the cita.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clie', 'id_clie');
    }

    /**
     * Get the barbero that owns the cita.
     */
    public function barbero()
    {
        return $this->belongsTo(Barbero::class, 'id_barbero', 'id_barbero');
    }
}
