<?php

namespace App\Models;

use App\Models\DetailsFactura;
use App\Models\DetalleSolicitud;
use Illuminate\Database\Eloquent\Model;

class Reverso extends Model
{
    /**
     * --------------------------------------------------------------------------
     * array asociativos para reverzar a estatus 2.
     * --------------------------------------------------------------------------
     */

    public function estatusDosDetailsFactura($id)
    {
        // Setear los valores para los campos de la tabla dst_detailsfactura
        $estatusDosDetailsFactura = [
            //'idtecnico' => $tlider,
            'nroserial' => null,
            'observaciones' => null,
            'receptorrt' => null,
            'fecharecibert' => null,
            'fechaprocesart' => null,
            'fechaentregatrans' => null,
            'fechaimpcertif' => null,
            'fechaentregadrt' => null,
            'fechafirmacertif' => null,
            'fechadevolatc' => null,
            'fecharecibcertifatc' => null,
            'fechaentregacliente' => null,
            'reasignado' => null,
            'estatus' => 2,
            'motivreasigna' => null,
            'fecharecibefirma_dg' => null,
            'fechaenvia_dg' => null,
            'fecha_emireg' => null,
            'fecha_vencreg' => null,
            'nro_registro' => null,
            'serial' => null,
            'tipo_registro' => null,
            'fechaenviafirma_cr' => null,
            'fecharecibefirma_cr' => null,
            'fechafirmado_cr' => null
        ];

        DetailsFactura::where('id', $id)->update($estatusDosDetailsFactura);
    }

    public function estatusDosDetalleSolicitud($idfactura, $fechaenviart)
    {
        // Setear los valores para los campos de la tabla dst_detallesolicitud 
        $estatusDosDetalleSolicitud = [
            'estatus' => 2,
            'observaciones' => null,
            'fechaprocesart' => null,
            'fechaentregatrans' => null,
            'fechaimpcertif' => null,
            'fechaentregadrt' => null,
            'fecharecibefirma_dg' => null,
            'fechadevolatc' => null,
            'fecharecibecertifatc' => null,
            'fechaentregacliente' => null,
            'fecha_emireg1' => null,
            'fecha_vencreg' => null,
            'serial' => null,
            'nro_registro' => null,
            //'nro_solicitud' => $nro_solicitud,
            'fechaenviart' => $fechaenviart,
            'fecha_emireg' => null,
            'fechaenvia_fdg' => null,
            'fechafirmacertif' => null,
            'entregado_a' => null,
            'cedula_ea' => null,
            'idsignatario' => null,
            'fechaenviafirma_cr' => null,
            'fecharecibefirma_cr' => null,
            'fechafirmado_cr' => null,
            'nombrearchivo' => null,
            'dfirmaelect' => null,
            'archivopdfdorso' => null,
            'dtmarchivado' => null,
            'dtmenviacr_drt' => null,
            'dtmrecibedrt_cr' => null,
            'blndorso' => null,
            'bfirmaelect' => null,
            'dtmdevuelvedrt_cr' => null,
            'dtmrecibecr_drt' => null,
            'strcriterio_tecnico' => null,
            'dtmenviadrt_dg' => null,
            'blnrechazo' => null
        ];

        DetalleSolicitud::where('idfactura', $idfactura)->update($estatusDosDetalleSolicitud);
    }

    public function cambiarTecnicoAsignaciones($idfactura)
    {
        // Setear los valores para los campos de la tabla dst_asignaciones
        $cambiarTecnico = [
            'getitems' => null,
            'dgetitems' => null,
            'reas_coord' => null,
            'reas_tecnico' => null,
            'reas_fecha' => null,
            'reas_hora' => null,
        ];

        Asignacion::where('idfactura', $idfactura)->update($cambiarTecnico);
    }

    public function estatusDosTicket($ticket_id)
    {
        // Setear los valores para los campos de la tabla ticket ya sea en el esq. reg044 | etiquetado
        $estatusDosTicket = [
            'estatus' => 'pendiente por pagar',
            'userlogin_a' => null,
            'userlogin_t' => null,
            'fecha_factura' => null,
            'nro_factura' => null,
            'monto_factura' => null,
            'fecha_emireg' => null,
            'fecha_vencreg' => null,
            'nombrearchivo' => null,
            'archivopdfdorso' => null,
            'blndorso' => null,
            'estatusbandeja' => 'pendiente por pagar',
            'strcriterio_tecnico' => null
        ];

        // Verificar si el registro existe en la tabla reg044
        $registro = reg044::where('ticket_id', $ticket_id)->first();

        if ($registro) {
            // Actualizar en la tabla reg044
            reg044::where('ticket_id', $ticket_id)->update($estatusDosTicket);
        } else {
            // Actualizar en la tabla Etiquetado
            Etiquetado::where('ticket_id', $ticket_id)->update($estatusDosTicket);
        }
    }

    /**
     * --------------------------------------------------------------------------
     * array asociativos para reverzar a estatus 3.
     * --------------------------------------------------------------------------
     */

    public function estatusTresDetailsFactura($id)
    {
        // Setear los valores para los campos de la tabla dst_detailsfactura
        $estatusTresDetailsFactura = [
            //'idtecnico' => $tlider,
            'nroserial' => null,
            'observaciones' => null,
            'receptorrt' => null,
            'fecharecibert' => null,
            'fechaprocesart' => null,
            'fechaentregatrans' => null,
            'fechaimpcertif' => null,
            'fechaentregadrt' => null,
            'fechafirmacertif' => null,
            'fechadevolatc' => null,
            'fecharecibcertifatc' => null,
            'fechaentregacliente' => null,
            'asignado' => 1,
            'reasignado' => null,
            'estatus' => 3,
            'motivreasigna' => null,
            'fecharecibefirma_dg' => null,
            'fechaenvia_dg' => null,
            'fecha_emireg' => null,
            'fecha_vencreg' => null,
            'nro_registro' => null,
            'serial' => null,
            'tipo_registro' => null,
            'fechaenviafirma_cr' => null,
            'fecharecibefirma_cr' => null,
            'fechafirmado_cr' => null
        ];

        DetailsFactura::where('id', $id)->update($estatusTresDetailsFactura);
    }

    public function estatusTresDetalleSolicitud($idfactura, $fechaenviart)
    {
        // Setear los valores para los campos de la tabla dst_detallesolicitud
        $estatusTresDetalleSolicitud = [
            'estatus' => 3,
            'observaciones' => null,
            'fechaentregatrans' => null,
            'fechaimpcertif' => null,
            'fechaentregadrt' => null,
            'fecharecibefirma_dg' => null,
            'fechadevolatc' => null,
            'fecharecibecertifatc' => null,
            'fechaentregacliente' => null,
            'fecha_emireg1' => null,
            'fecha_vencreg' => null,
            'serial' => null,
            'nro_registro' => null,
            /* 'nro_solicitud' => null, */
            'fechaenviart' => $fechaenviart,
            'fecha_emireg' => null,
            'fechaenvia_fdg' => null,
            'fechafirmacertif' => null,
            'entregado_a' => null,
            'cedula_ea' => null,
            'idsignatario' => null,
            'fechaenviafirma_cr' => null,
            'fecharecibefirma_cr' => null,
            'fechafirmado_cr' => null,
            'bfirmaelect' => null,
            'nombrearchivo' => null,
            'dfirmaelect' => null,
            'archivopdfdorso' => null,
            'blndorso' => null,
            'blnarchivado' => null,
            'dtmarchivado' => null,
            'dtmenviacr_drt' => null,
            'dtmrecibedrt_cr' => null,
            'dtmdevuelvedrt_cr' => null,
            'dtmrecibecr_drt' => null,
            'strcriterio_tecnico' => null,
            'dtmenviadrt_dg' => null,
            'blnrechazo' => null
        ];

        DetalleSolicitud::where('idfactura', $idfactura)->update($estatusTresDetalleSolicitud);
    }

    public function Ticket($ticket_id)
    {
        // Setear los valores para los campos de la tabla ticket ya sea en el esq. reg044 | etiquetado
        $estatusTresTicket = [
            'estatus' => 'en proceso',
            'userlogin_a' => null,
            'userlogin_t' => null,
            'fecha_factura' => null,
            'nro_factura' => null,
            'monto_factura' => null,
            'fecha_emireg' => null,
            'fecha_vencreg' => null,
            'festatusfdg' => null,
            'bfirmaelect' => null,
            'fechafirmaqr' => null,
            'idsignatario' => null,
            'nombrearchivo' => null,
            'fechafirmaelect' => null,
            'archivopdfdorso' => null,
            'blndorso' => null,
            'estatusbandeja' => 'en proceso',
            'intrevdrt' => null,
            'strcriterio_tecnico' => null
        ];

        // Verificar si el registro existe en la tabla reg044
        $registro = reg044::where('ticket_id', $ticket_id)->first();

        if ($registro) {
            // Actualizar en la tabla reg044
            reg044::where('ticket_id', $ticket_id)->update($estatusTresTicket);
        } else {
            // Actualizar en la tabla Etiquetado
            Etiquetado::where('ticket_id', $ticket_id)->update($estatusTresTicket);
        }
    }
}