<?php

namespace App\Models\Sis;

use App\Models\Sis\Certificado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstatusCertificado extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'solicitud.statuscertificado';

    protected $primaryKey = 'idstatuscertificado';

    /* los atributo especificados del modelo se convertirá automáticamente a un objeto Carbon (una clase para trabajar con fechas y horas en PHP) cuando se accedan a ellos. */
    protected $casts = [
        'dtmfechastatus' => 'datetime',
    ];

    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }
}
