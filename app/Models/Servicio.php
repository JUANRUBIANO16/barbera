<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'servicio';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_serv';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the ventas for the servicio.
     */
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_serv', 'id_serv');
    }
}
