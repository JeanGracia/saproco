<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetado extends Model
{
    use HasFactory;

    protected $connection = 'mckoi';

    protected $table = 'etiquetado.ticket';

    /* Por defecto, Eloquent asume que la clave primaria de la tabla es "id", pero si el nombre real de la clave primaria en la tabla es diferente, como en este caso "ticket_id", es necesario especificarlo explícitamente */
    protected $primaryKey = 'ticket_id';

    public $timestamps = false;

    protected $fillable = [
        'estatus',
        'userlogin_a',
        'userlogin_t',
        'fecha_factura',
        'nro_factura',
        'monto_factura',
        'fecha_emireg',
        'fecha_vencreg',
        'festatusfdg',
        'bfirmaelect',
        'fechafirmaqr',
        'idsignatario',
        'nombrearchivo',
        'fechafirmaelect',
        'archivopdfdorso',
        'blndorso',
        'estatusbandeja',
        'intrevdrt',
        'strcriterio_tecnico'
    ];
}
