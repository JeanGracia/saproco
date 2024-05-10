<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'public.status';

    protected $primaryKey = 'idstatus';

    public function asignaciones()
    {
        return $this->belongsToMany(Asignacion::class, 'estatusasignacion');
    }

}
