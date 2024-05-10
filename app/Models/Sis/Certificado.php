<?php

namespace App\Models\Sis;

use App\Models\Sis\Solicitud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificado extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'solicitud.certificado';

    protected $primaryKey = 'idcertificado';

    /* los atributo especificados del modelo se convertirá automáticamente a un objeto Carbon (una clase para trabajar con fechas y horas en PHP) cuando se accedan a ellos. */
    protected $casts = [
        'dtmfechaemision' => 'date:d/m/Y',
        'dtmfechavencimiento' => 'date:d/m/Y'
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function estatusCertificado()
    {
        return $this->hasMany(EstatusCertificado::class);
    }
}
