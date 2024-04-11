<?php

namespace App\Models\Sigesca\Public;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $connection = 'sigesca';

    protected $table = 'public.pagos';

    protected $casts = [
        'fecha' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
        'deleted_at' => 'date'
    ]; //el campo "ultimo_dia" se debe manejar como una fecha.

    protected $guarded = [
        'id',
        'solicitud_id'
    ]; // lista negra para proteger los valores de los campos especificados de actualizaciones o borrados


    protected $fillable = [
        'nro_referencia',
        'fecha',
        'monto',
        'created_at',
        'updated_at',
        'deleted_at'
    ];// lista blanca de atributos que se pueden asignar masivamente
}
