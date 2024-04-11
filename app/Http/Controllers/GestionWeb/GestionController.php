<?php

namespace App\Http\Controllers\GestionWeb;

use App\Models\reg044;
use App\Models\Cliente;
use App\Models\Estatus;
use App\Models\Reverso;
use App\Models\Tecnico;
use App\Models\Asignacion;
use App\Models\CertInspeccion;
use App\Models\Etiquetado;
use Illuminate\Http\Request;
use App\Models\DetailsFactura;
use App\Models\Consultatecnica;
use App\Models\DetalleSolicitud;
use App\Models\Eficiencia;
use App\Models\Niv;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class GestionController extends Controller
{
    protected $reversos;
    public $servicio;
    protected $eficienciaEnergiteca;
    protected $niv; // número de identificación vehicular
    protected $consultaTecnica;
    protected $ticket; // registros nacionales importados & etiquetado
    protected $certInspeccion;
    protected $consultaRegimenMetrologia;

    public function __construct(Reverso $reverso)
    {
        $this->reversos = $reverso;
        $this->ticket = [~'[0-9]']; // etiquetado & 044
        $this->servicio = ['CTRL', 'CTSPN', 'CTPN', 'CTRL_MET', 'EE', 'AA', 'NIV', 'CI']; // etiquetado & 044 para usar con el operador !=
        $this->eficienciaEnergiteca = ['EE', 'AA'];
        $this->niv = ['NIV'];
        $this->consultaTecnica = ['CTRL', 'CTSPN', 'CTPN'];
        $this->certInspeccion = ['CI'];
        $this->consultaRegimenMetrologia = ['CTRL_MET']; //consulta tecnica regimen legal metrologia
    }

    public function buscarFactura()
    {
        return view('buscarFactura');
    }

    public function index(Request $request, Asignacion $asignaciones)
    {
        // validaciones para el campo de búsqueda de factura
        $request->validate([
            'introducir_factura' => 'required|max:15|regex:/^[A-Z0-9\-]+$/',
            'opcion_reverso' => 'required'
        ]);

        /* desde la vista home.blade.php el input maneja los atributos name="introducir_factura" | name="opcion_reverso" y los pasa al $request entrante */
        $search = $request->input('introducir_factura');
        $reverso = $request->input('opcion_reverso');

        // busca el número de factura proporcionado por el usuario en el input
        $facturas = DetailsFactura::where('nrofactura', 'like', '%' . $search . '%')->get();
        $tipoServicio = $facturas->last()->online;

        /* se está utilizando el método last() para obtener el último elemento de la colección de solicitudes ($facturas), y luego se accede al atributo idcliente de ese último elemento. */
        $idCliente = $facturas->last()->idcliente;

        /* la consulta busca en la base de datos de facturaweb a aquellos registros cuyo campo "id_cliente" coincida con el valor contenido en la variable $idCliente. Una vez que se encuentra el registro se recuperan como una colección de objetos Cliente y se asignan a la variable $clientes. */
        $clientes = Cliente::where('id_cliente', $idCliente)->get();

        $idEstatus = $facturas->last()->estatus;
        $estatus = Estatus::where('id', $idEstatus)->get();

        $idFactura = $facturas->last()->id;
        $solicitudes = DetalleSolicitud::where('idfactura', $idFactura)->get();

        $Asignacion = $solicitudes->last()->idfactura;
        $asignaciones = Asignacion::where('idfactura', $Asignacion)->get();

        $asignaciones->last()->idtecnico;
        $asignaciones->last()->tlider;

        // para evitar el cruce de informacion entre nombre y user_security al mostrar datos en la vista
        $idtecnico = Tecnico::where('id_tecnico', $asignaciones->last()->idtecnico)->select('nombre', 'user_security')->first();
        $tlider = Tecnico::where('id_tecnico', $asignaciones->last()->tlider)->select('nombre', 'user_security')->first();

        // verificamos si hay más de un registro
        if ($asignaciones->count() > 1) {
            // encontrar el registro más reciente basado en el campo 'fasigna'
            $asignacionMasReciente = $asignaciones->sortByDesc('fasigna')->first();

            // eliminar dicho registro
            $asignacionMasReciente->delete();
        }

        // en caso de que el tipo de servio corresponda a " " se eliminara el registro PD: una vez haga la busqueda de la factura este proceso se hara efectivo
        $eliminarRegistro = []; //importante este array se encarga de pasar las colecciones de datos a las vistas.

        if (in_array($tipoServicio, $this->eficienciaEnergiteca)) {

            $eficienciaEnergiteca = Eficiencia::where('idfactura', $idFactura)->get();

            if (!empty($eficienciaEnergiteca)) {
                $eliminarRegistro['eficienciaEnergiteca'] = $eficienciaEnergiteca;
            }
        } elseif (in_array($tipoServicio, $this->consultaTecnica)) {

            $consultaTecnica = Consultatecnica::where('idfactura', $idFactura)->get();

            if (!empty($consultaTecnica)) {
                $eliminarRegistro['consultaTecnica'] = $consultaTecnica;
            }
        } elseif (in_array($tipoServicio, $this->niv)) {

            $niv = Niv::where('idfactura', $idFactura)->get();

            if (!empty($niv)) {
                $eliminarRegistro['niv'] = $niv;
            }
        } elseif (in_array($tipoServicio, $this->certInspeccion)) {

            $certInspeccion = CertInspeccion::where('idfactura', $idFactura)->get();

            if (!empty($certInspeccion)) {
                $eliminarRegistro['certInspeccion'] = $certInspeccion;
            }
        }

        if ($reverso == 2) {
            //dd($eliminarRegistro);
            $asignaRegional = $facturas->last()->regional;
            //dd($data);
            if ($tipoServicio != 'CTRL' && !in_array($tipoServicio, $this->consultaRegimenMetrologia)) {
                // match para asignar técnico según regional
                $asignarTecnicoBasedOnRegion = [
                    'TU1' => '546', // taquilla unica caracas - mbelog
                    'R1G' => '546', // mbelog
                    'R1'  => '546', // region central - mbelog
                    'RG1' => '546', // mbelog
                    'R2'  => '640', // region centro llanera - svasquez
                    'R2V' => '640', // svasquez
                    'R3'  => '406', // region centro occidenta lllanera - mahernandez
                    'R3T' => '406', // mahernandez
                    'R3B' => '406', // mahernandez
                    'R3Y' => '406', // mahernandez
                    'R4'  => '681', // region occidental - vhernandez
                    'R4T' => '681', // vhernandez
                    'R4F' => '681', // falcon - vhernandez
                    'RG10' => '518', // region andina - ramartinez
                    'R10T' => '518', // tachira - ramartinez
                    'R10V' => '518', // ramartinez
                    'RG11' => '478', // region llanera - ecarmona
                    'R5'  => '658', // region guayana - jperezm
                    'R6'  => '628', // region insular - lvargas
                    'R8'  => '618', // region oriente - earreaza
                    'R8A' => '618', // earreaza
                    //'R5B' => '618', // earreaza
                    'R8B' => '618', // earreaza
                    'R8C' => '618', // earreaza
                ];

                // verificar si el valor de $asignaRegional coincide con alguna clave del arreglo asociativo
                if (array_key_exists($asignaRegional, $asignarTecnicoBasedOnRegion)) {
                    $tecnicoAsignado = $asignarTecnicoBasedOnRegion[$asignaRegional];

                    DetailsFactura::where('id', $Asignacion)->update(['idtecnico' => $tecnicoAsignado]);
                    Asignacion::where('idfactura', $Asignacion)->update(['idtecnico' => $tecnicoAsignado]);
                } else {
                    dd("No se encontró un match para la regional: " . $asignaRegional);
                }
            } elseif ($tipoServicio == 'CTRL') {

                DetailsFactura::where('id', $Asignacion)->update(['idtecnico' => '380']);
                Asignacion::where('idfactura', $Asignacion)->update(['idtecnico' => '380']);
            } elseif (in_array($tipoServicio, $this->consultaRegimenMetrologia)) {

                DetailsFactura::where('id', $Asignacion)->update(['idtecnico' => '657']);
                Asignacion::where('idfactura', $Asignacion)->update(['idtecnico' => '657']);
            }

            $idTecnico = $asignaciones->last()->idtecnico;
            $tecnicos = Tecnico::where('id_tecnico', $idTecnico)->get();

            // online en DB gestionweb tbl dst_detailsfactura == ticket_id en DB mckoi esq. reg044 tbl ticket
            $ticket_id = $facturas->last()->online;

            if ($tipoServicio != $this->servicio) {
                if (!in_array($ticket_id, $this->servicio)) {
                    $tickets = reg044::where('ticket_id', $ticket_id)->get();
                    if ($tickets->isEmpty()) {
                        // si no se encontraron tickets en la tabla reg044.ticket, busca en etiquetado.ticket:
                        $tickets = Etiquetado::where('ticket_id', $ticket_id)->get();
                    }
                }
            }

            // array con las variables que se estan pasando a la vista
            $data = compact('search', 'solicitudes', 'estatus', 'clientes', 'facturas', 'idFactura', 'asignaciones', 'tecnicos', 'idtecnico', 'tlider');

            // para comprobar si tickets no está vacía y agregarla al array data ( va a pasar siempre que el servicio sea 044 o etiquetado)
            if (!empty($tickets)) {
                $data['tickets'] = $tickets;
            }

            $return = array_merge($data, $eliminarRegistro);
            //dd($return);
            //dd($eliminarRegistro);

            return view('mostrarFacturaReversarEstatus2', $return);
        } elseif ($reverso == 3) {
            //dd($eliminarRegistro);
            $idTecnico = $facturas->last()->idtecnico;
            $tecnicoFacturas = Tecnico::where('id_tecnico', $idTecnico)->get();

            $idTecnicoSolicitud = $solicitudes->last()->idsignatario;
            $tecnicoSolicitudes = Tecnico::where('id_tecnico', $idTecnicoSolicitud)->get();

            // online en DB gestionweb tbl dst_detailsfactura == ticket_id en DB mckoi esq. reg044 tbl ticket
            $ticket_id = $facturas->last()->online;

            if ($tipoServicio != $this->servicio) {
                if (!in_array($ticket_id, $this->servicio)) {
                    $tickets = reg044::where('ticket_id', $ticket_id)->get();
                    if ($tickets->isEmpty()) {
                        // si no se encontraron tickets en la tabla reg044.ticket, busca en etiquetado.ticket:
                        $tickets = Etiquetado::where('ticket_id', $ticket_id)->get();
                    }
                }
            }

            /* al verificar si las variables como $consultas y $tickets están vacías y asignarles una colección vacía en caso de ser así, se garantiza que siempre existirá una estructura definida para estas variables en el array $data que se pasa a la vista. Esto ayuda a prevenir errores relacionados con variables nulas en la vista al agregar las variables al array $data solo si contienen datos, se evita enviar información innecesaria */

            // array con las variables que se estan pasando a la vista
            $data = compact('search', 'solicitudes', 'estatus', 'clientes', 'facturas', 'idFactura', 'asignaciones', 'tecnicoFacturas', 'tecnicoSolicitudes');

            // para comprobar si tickets no está vacía y agregarla al array data ( va a pasar siempre que el servicio sea 044 o etiquetado)
            if (!empty($tickets)) {
                $data['tickets'] = $tickets;
            }

            $return = array_merge($data, $eliminarRegistro);

            return view('mostrarFacturaReversarEstatus3', $return);
        }
    }

    /**
     * --------------------------------------------------------------------------
     * Funciones encargadas de manejar el reverso de una factura a estatus 2
     * --------------------------------------------------------------------------
     */

    public function detailsFactura($id)
    {
        $this->reversos->estatusDosDetailsFactura($id);

        return redirect()->back()
            ->with('success', 'Factura reversada correctamente a estatus 2 en la tbl dst_detailsfactura');
    }

    public function detalleSolicitud($idfactura, $fechaenviart)
    {
        $this->reversos->estatusDosDetalleSolicitud($idfactura, $fechaenviart);

        return redirect()->back()
            ->with('success', 'Factura reversada correctamente a estatus 2 en la tbl dst_detallesolicitud');
    }

    public function asignaciones($idfactura)
    {
        $this->reversos->cambiarTecnicoAsignaciones($idfactura);

        return redirect()->back()
            ->with('success', 'El idtecnico fue modificado en la tbl dst_asignaciones');
    }

    public function tickets($idfactura)
    {
        $this->reversos->Ticket($idfactura);

        return redirect()->back()
            ->with('success', 'Factura reversada correctamente a estatus 2 en la tbl ticket');
    }


    /**
     * --------------------------------------------------------------------------
     * Funciones encargadas de manejar el reverso de una factura a estatus 3
     * --------------------------------------------------------------------------
     */

    public function factura($id)
    {
        $this->reversos->estatusTresDetailsFactura($id);

        return redirect()->back()
            ->with('success', 'Factura reversada correctamente a estatus 3 en la tbl dst_detailsfactura');
    }

    public function solicitud($idfactura, $fechaenviart)
    {
        $this->reversos->estatusTresDetalleSolicitud($idfactura, $fechaenviart);

        return redirect()->back()
            ->with('success', 'Factura reversada correctamente a estatus 3 en la tbl dst_detallesolicitud');
    }

    public function ticket($idfactura)
    {
        $this->reversos->Ticket($idfactura);

        return redirect()->back()
            ->with('success', 'Factura reversada correctamente a estatus 3 en la tbl ticket');
    }

    /**
     * --------------------------------------------------------------------------
     * Métodos encargados de eliminar registros según el servicio
     * --------------------------------------------------------------------------
     */

    public function eficiencia($idfactura)
    {
        Eficiencia::where('idfactura', $idfactura)->delete();

        return redirect()->back()
            ->with('success', 'Registro eliminado correctamente');
    }

    public function consultaTecnica($idfactura)
    {
        Consultatecnica::where('idfactura', $idfactura)->delete();

        return redirect()->back()
            ->with('success', 'Registro eliminado correctamente');
    }

    public function niv($idfactura)
    {
        Niv::where('idfactura', $idfactura)->delete();

        return redirect()->back()
            ->with('success', 'Registro eliminado correctamente');
    }

    public function certInspeccion($idfactura)
    {
        CertInspeccion::where('idfactura', $idfactura)->delete();

        return redirect()->back()
            ->with('success', 'Registro eliminado correctamente');
    }
}
