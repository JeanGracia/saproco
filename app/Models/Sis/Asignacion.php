<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'gestion.asignacion';

    protected $primaryKey = 'idasignacion';

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function statusAsignacion()
    {
        return $this->hasMany(EstatusAsignacion::class);
    }

    public function status()
    {
        return $this->belongsToMany(Status::class, 'estatusasignacion');
    }
}
