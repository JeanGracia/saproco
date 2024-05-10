<?php

namespace App\Models\Sis;

use App\Models\Sis\Asignacion;
use App\Models\Sis\Certificado;
use App\Models\Sis\FacturaSolicitud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solicitud extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'solicitud.solicitud';

    protected $primaryKey = 'idsolicitud';

    /* los atributos especificados del modelo se convertirá automáticamente a un objeto Carbon (una clase para trabajar con fechas y horas en PHP) cuando se accedan a ellos. */
    protected $casts = [
        'dtmfechasolicitud' => 'datetime',
    ];

    public function facturaSolicitud()
    {
        return $this->hasMany(FacturaSolicitud::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function certificado()
    {
        return $this->hasOne(Certificado::class);
    }
}
