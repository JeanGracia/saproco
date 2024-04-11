<?php

namespace App\Http\Controllers\Sigesca;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sigesca\Public\Empresa;
use App\Models\Sigesca\Public\Pago;
use App\Models\Sigesca\Public\ProductSolicitud;
use App\Models\Sigesca\Public\Solicitud;
use App\Models\Sigesca\Public\User;

class PagoController extends Controller
{
    public function index()
    {
        return view('sigesca.pago.buscarSolicitud');
    }

    public function show(Request $request)
    {
        // validaciones para el campo de búsqueda de solicitud
        $request->validate([
            'solicitud' => ['required', 'integer'],
        ]);
        
        $solicitud = $request->input('solicitud');
        /* dd($solicitud); */
        $solicitudes = Solicitud::where('id', 'like', '%' . $solicitud . '%')->get();
        //dd($solicitudes[0]['id']);
        //dd($solicitudes[0]['user_id']);

        $product_solicitud_id = $solicitudes->last()->id;
        $empresa_id = $solicitudes->last()->user_id;

        //todos los productos asociados a la solicitud
        $productos = ProductSolicitud::where('solicitud_id', $product_solicitud_id)->get();
        $cantidadProductos = ProductSolicitud::where('solicitud_id', $product_solicitud_id)->count();

        $usuarios = User::where('id', $empresa_id)->get();
        $rif = $usuarios->last()->name;

        $empresas = Empresa::where('rif', $rif)->get();

        return view('sigesca.pago.mostrarSolicitud', compact('solicitudes', 'productos', 'cantidadProductos', 'empresas'));
    }

    public function edit($solicitud)
    {
        $cargarPagos = Pago::where('solicitud_id', $solicitud)->get();
        //dd($cargarPagos);

        return view('sigesca.pago.cargarPago', compact('cargarPagos'));
    }

    public function Solicituds(Solicitud $actualizar, $solicitud)
    {
        $actualizar = [
            'deleted_at' => NULL,
            'status_id' => 14
        ];

        Solicitud::where('id', $solicitud)->update($actualizar);

        return back()->with('success', 'El estatus fue actualizado correctamente');
    }

    public function ProductSolicitud(ProductSolicitud $actualizar, $solicitud)
    {
        $actualizar = [
            'deleted_at' => NULL
        ];

        ProductSolicitud::where('solicitud_id', $solicitud)->update($actualizar);

        return back()->with('success', 'El campo deleted_at se estableció a null correctamente');
    }

    public function update(Request $request, Pago $pagos, $solicitud)
    {
        //dd($solicitud);

        $request->validate([
            'referencia' => 'required',
            'fecha' => 'required|date',
            'monto' => 'required|regex:/^\d+(\.\d{2})?$/'
        ]);

        $pagos = [
            'nro_referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
            'updated_at' => now(),
            'deleted_at' => null,
        ];

        //dd($pagos);

        Pago::where('solicitud_id', $solicitud)->update($pagos);

        //Redireccionar
        return back()->with('success', 'El pago fue cargado correctamente');
    }
}
