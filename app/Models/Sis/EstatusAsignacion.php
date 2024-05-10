<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusAsignacion extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'gestion.estatusasignacion';

    protected $primaryKey = 'idestatusasignacion';

    /* los atributos especificados del modelo se convertirá automáticamente a un objeto Carbon (una clase para trabajar con fechas y horas en PHP) cuando se accedan a ellos. */
    protected $casts = [
        'dtmfechastatus' => 'datetime',
    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
