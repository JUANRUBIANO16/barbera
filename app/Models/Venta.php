<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ventas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_venta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'valor',
        'cantidad',
        'total',
        'id_serv',
        'id_clie',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the servicio that owns the venta.
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_serv', 'id_serv');
    }

    /**
     * Get the cliente that owns the venta.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clie', 'id_clie');
    }

    /**
     * Get the comprobantes for the venta.
     */
    public function comprobantes()
    {
        return $this->hasMany(Comprobante::class, 'id_venta', 'id_venta');
    }
}
