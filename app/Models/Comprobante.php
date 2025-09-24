<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comprobante';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_comprobante';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'hora',
        'id_venta',
        'id_tipo_pago',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the venta that owns the comprobante.
     */
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta', 'id_venta');
    }

    /**
     * Get the tipo de pago that owns the comprobante.
     */
    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'id_tipo_pago', 'id_tipo_pago');
    }
}
