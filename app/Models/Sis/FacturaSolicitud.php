<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaSolicitud extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'factura.facturasolicitud';

    protected $primaryKey = 'idfacturasolicitud';

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }
}
