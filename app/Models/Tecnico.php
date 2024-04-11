<?php

namespace App\Models;

use App\Models\Asignacion;
use App\Models\DetalleSolicitud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tecnico extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.dst_tecnicos';

    protected $primaryKey = 'id_tecnico';

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function detalleSolicitud()
    {
        return $this->hasMany(DetalleSolicitud::class);
    }
}
