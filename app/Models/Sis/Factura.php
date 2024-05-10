<?php

namespace App\Models\Sis;

use App\Models\Sis\FacturaSolicitud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'factura.factura';

    protected $primaryKey = 'idfactura';

    /* los atributos especificados del modelo se convertirá automáticamente a un objeto Carbon (una clase para trabajar con fechas y horas en PHP) cuando se accedan a ellos. */
    protected $casts = [
        'dtmfechafactura' => 'datetime',
    ];

    public function facturaSolicitud()
    {
        return $this->hasMany(FacturaSolicitud::class);
    }
}
