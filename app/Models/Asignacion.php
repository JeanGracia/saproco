<?php

namespace App\Models;

use App\Models\Tecnico;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignacion extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.dst_asignaciones';

    public $timestamps = false;

    /* independientemente del estatus en que se encuentre y requiera reversar la solicitud si el servicio es de etiquetado o 044 la fecha en el campo especificado debe permanecer para que llegue a la bandeja de reglamentos técnicos
    protected $dates = [
        'enviadort'
    ]; */

    protected $fillable = [
        'getitems',
        'dgetitems',
        'reas_coord',
        'reas_tecnico',
        'reas_fecha',
        'reas_hora'
    ];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }
}
