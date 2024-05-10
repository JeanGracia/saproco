<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpresionCertificado extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'solicitud.impresioncertificado';

    protected $primaryKey = 'idimpresioncertificado';

    protected $casts = [
        'dtmfechaimpresion' => 'date:d/m/Y',
    ];
}
