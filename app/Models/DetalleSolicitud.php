<?php

namespace App\Models;

use App\Models\Tecnico;
use App\Models\DetailsFactura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleSolicitud extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.dst_detallesolicitud';

    public $timestamps = false;

    protected $dates = [
        'fechaprocesart',
        'fechaentregatrans',
        'fechaimpcertif',
        'fechaentregadrt',
        'fecharecibefirma_dg',
        'fechadevolatc',
        'fecharecibecertifatc',
        'fechaentregacliente',
        'fecha_emireg1',
        'fecha_vencreg',
        'fechaenviart',
        'fecha_emireg',
        'fechaenvia_fdg',
        'fechafirmacertif',
        'fechaenviafirma_cr',
        'fecharecibefirma_cr',
        'fechafirmado_cr',
        'dfirmaelect',
        'dtmarchivado',
        'dtmenviacr_drt',
        'dtmrecibedrt_cr',
        'dtmdevuelvedrt_cr',
        'dtmrecibecr_drt',
        'dtmenviadrt_dg'
    ];

    // lista blanca de atributos que se pueden asignar masivamente
    protected $fillable = [
        'estatus',
        'observaciones',
        'fechaprocesart',
        'fechaentregatrans',
        'fechaimpcertif',
        'fechaentregadrt',
        'fecharecibefirma_dg',
        'fechadevolatc',
        'fecharecibecertifatc',
        'fechaentregacliente',
        'fecha_emireg1',
        'fecha_vencreg',
        'serial',
        'nro_registro',
        'fechaenviart',
        'fecha_emireg',
        'fechaenvia_fdg',
        'fechafirmacertif',
        'entregado_a',
        'cedula_ea',
        'idsignatario',
        'fechaenviafirma_cr',
        'fecharecibefirma_cr',
        'fechafirmado_cr',
        'bfirmaelect',
        'nombrearchivo',
        'dfirmaelect',
        'archivopdfdorso',
        'blndorso',
        'blnarchivado',
        'dtmarchivado',
        'dtmenviacr_drt',
        'dtmrecibedrt_cr',
        'dtmdevuelvedrt_cr',
        'dtmrecibecr_drt',
        'strcriterio_tecnico',
        'dtmenviadrt_dg',
        'blnrechazo'
    ];

    // lista negra para proteger los valores de los campos especificados de actualizaciones o borrados
    protected $guarded = [
        'id',
        'idfactura',
        'nro_solicitud'
    ];

    // relaciones
    public function detailsFactura()
    {
        return $this->belongsTo(DetailsFactura::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }
}
