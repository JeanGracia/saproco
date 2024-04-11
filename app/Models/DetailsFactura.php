<?php

namespace App\Models;

use App\Models\DetalleSolicitud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailsFactura extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.dst_detailsfactura';

    public $timestamps = false;

    protected $dates = [
        'fechaservicio',
        'fechaasignaatc',
        'fechaenviart',
        'fecharecibert',
        'fechaprocesart',
        'fechaentregatrans',
        'fechaimpcertif',
        'fechaentregadrt',
        'fechafirmacertif',
        'fechadevolatc',
        'fecharecibcertifatc',
        'fechaentregacliente',
        'fecharecibefirma_dg',
        'fechaenvia_dg',
        'fecha_emireg',
        'fecha_vencreg',
        'fechaenviafirma_cr',
        'fecharecibefirma_cr',
        'fechafirmado_cr'
    ];

    // lista blanca de atributos que se pueden asignar masivamente
    protected $fillable = [
        'idtecnico',
        'nroserial',
        'observaciones',
        'receptorrt',
        'fecharecibert',
        'fechaprocesart',
        'fechaentregatrans',
        'fechaimpcertif',
        'fechaentregadrt',
        'fechafirmacertif',
        'fechadevolatc',
        'fecharecibcertifatc',
        'fechaentregacliente',
        'reasignado',
        'estatus',
        'motivreasigna',
        'fecharecibefirma_dg',
        'fechaenvia_dg',
        'fecha_emireg',
        'fecha_vencreg',
        'nro_registro',
        'serial',
        'tipo_registro',
        'fechaenviafirma_cr',
        'fecharecibefirma_cr',
        'fechafirmado_cr'
    ];

    // lista negra para proteger los valores de los campos especificados de actualizaciones o borrados
    protected $guarded = [
        'id',
        'online',
        'idcliente',
        'regional',
        'nrofactura',
        'fechaasignaatc',
        'fechaenviart',
        'asignado'
    ];

    //Relaciones
    public function detalleSolicitud()
    {
        return $this->hasMany(DetalleSolicitud::class);
    }
}
