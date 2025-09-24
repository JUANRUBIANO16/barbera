<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'disponibilidad';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_disp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'hora_de_inicio',
        'hora_final',
        'id_barbero',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the barbero that owns the disponibilidad.
     */
    public function barbero()
    {
        return $this->belongsTo(Barbero::class, 'id_barbero', 'id_barbero');
    }
}
