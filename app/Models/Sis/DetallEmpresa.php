<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallEmpresa extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'registro.detalleempresa';

    protected $primaryKey = 'iddetalleempresa';

    /* los atributo especificados del modelo se convertirá automáticamente a un objeto Carbon (una clase para trabajar con fechas y horas en PHP) cuando se accedan a ellos. */
    protected $casts = [
        'fechaactualizacion' => 'datetime',
        'dtmregistromercantil' => 'datetime',
        'emprendedor_emision' => 'datetime',
        'artesano_emision' => 'datetime'
    ];
}
