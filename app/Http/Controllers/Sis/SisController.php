<?php

namespace App\Http\Controllers\Sis;

use App\Http\Controllers\Controller;
use App\Models\Sis\Asignacion;
use App\Models\Sis\Certificado;
use App\Models\Sis\DetallEmpresa;
use App\Models\Sis\EstatusAsignacion;
use App\Models\Sis\EstatusCertificado;
use App\Models\Sis\Factura;
use App\Models\Sis\FacturaSolicitud;
use App\Models\Sis\ImpresionCertificado;
use App\Models\Sis\MemoCertificados;
use App\Models\Sis\SolicitudStatus;
use Illuminate\Http\Request;

class SisController extends Controller
{
    public function index()
    {
        return view('sis.buscar-rem');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $request->validate([
            'factura' => 'required|max:15|regex:/^[0-9]+$/',
            'id_sencamer' => ['required', 'max:15', 'regex:/^(EN|PN)[0-9]+$/']
        ]);

        $factura = $request->input('factura');
        $id_sencamer = $request->input('id_sencamer');

        $empresas = DetallEmpresa::where('idsencamer', $id_sencamer)->get();
        //dump($empresas);

        $facturas = Factura::where('intnrofactura', 'like', '%' . $factura . '%')
            ->where('idsencamer', $id_sencamer)
            ->get();
        //dump($facturas);
        $idFactura = $facturas->last()->idfactura;
        //dump($idFactura);

        $facturaSolicitud = FacturaSolicitud::where('idfactura', $idFactura)->get();
        //dump($facturaSolicitud);
        $idSolicitud = $facturaSolicitud->last()->idsolicitud;
        //dump($idSolicitud);

        $solicitudStatus = SolicitudStatus::where('idsolicitud', $idSolicitud)->get();
        //dump($solicitudStatus);

        $asignacion = Asignacion::where('idsolicitud', $idSolicitud)->get();
        $idAsignacion = $asignacion->pluck('idasignacion');
        //dump($idAsignacion);

        $estatusAsignacion = EstatusAsignacion::whereIn('idasignacion', $idAsignacion)->pluck('idestatusasignacion');
        dump($estatusAsignacion);

        $certificado = Certificado::where('idsolicitud', $idSolicitud)->pluck('idcertificado');
        //dump($certificado);

        $statusCertificado = EstatusCertificado::where('idcertificado', $certificado)->pluck('idstatuscertificado');
        //dump($statusCertificado);

        $impresionCertificado = ImpresionCertificado::where('idcertificado', $certificado)->pluck('idimpresioncertificado');
        //dump($impresionCertificado);

        $memocertificados = MemoCertificados::where('idcertificado', $certificado)->pluck('idmemocertificados');
        //dump($memocertificados);

        /* $data = [
            'facturas' => $facturas,
            'facturaSolicitud' => $facturaSolicitud,
            'solicitudStatus' => $solicitudStatus,
            'asignacion' => $asignacion,
            'estatusAsignacion' => $estatusAsignacion,
            'certificado' => $certificado,
            'statusCertificado' => $statusCertificado,
            'impresionCertificado' => $impresionCertificado,
            'memocertificados' => $memocertificados
        ]; */

        return view('sis.mostrar-rem', compact(
            'empresas',
            'facturas',
            'facturaSolicitud',
            'solicitudStatus',
            'asignacion',
            'idAsignacion',
            'estatusAsignacion',
            'certificado',
            'statusCertificado',
            'impresionCertificado',
            'memocertificados',
            'idSolicitud',
            'memocertificados',
            'impresionCertificado',
            'statusCertificado'
        ));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy($asignacion, $idSolicitud, $memocertificados, $impresionCertificado, $statusCertificado, $certificado)
    {
        //$asignacionArray = explode(',', $asignacion);
        //$idsToDelete = collect($asignacion);
        EstatusAsignacion::whereIn('idestatusasignacion', $asignacion)->delete();
        $idSolicitudArray = explode(',', $idSolicitud);
        foreach ($idSolicitudArray as $id) {
            Asignacion::destroy($id);
        }
        //Asignacion::where('idsolicitud', $idSolicitudArray)->delete();
        MemoCertificados::whereIn('idmemocertificados', $memocertificados)->delete();
        ImpresionCertificado::where('idimpresioncertificado', $impresionCertificado)->delete();
        EstatusCertificado::whereIn('idstatuscertificado', $statusCertificado)->delete();
        Certificado::where('idcertificado', $certificado)->delete();

        return redirect()->back()
            ->with('success', 'REM reversado correctamente');
    }
}
