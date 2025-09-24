<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_de_pago';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_pago';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'metodo',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the comprobantes for the tipo de pago.
     */
    public function comprobantes()
    {
        return $this->hasMany(Comprobante::class, 'id_tipo_pago', 'id_tipo_pago');
    }
}
