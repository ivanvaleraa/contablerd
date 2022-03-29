<?php

namespace App\Http\Controllers\Contabilidad;

use App\Http\Controllers\Controller;
use App\Models\CondicionPago;
use App\Models\CxP;
use App\Models\Empleado;
use App\Models\Suplidor;
use Illuminate\Http\Request;

class CxPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suplidor_selected = $request->input('suplidor','');
        $cxpQuery = CxP::with('suplidor','cat_condicion_pago');

        if($request->filled('suplidor')){
            $cxpQuery->where('id_suplidor', $suplidor_selected);
        }
        $cxps = $cxpQuery->whereNull('deleted_at')->get();
        return view('contabilidad.cxp.index', compact('cxps','suplidor_selected'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $suplidores = Suplidor::orderBy('nombre')->get();
        $condiciones_pago = CondicionPago::all();

        return view('contabilidad.cxp.create', compact('suplidores','condiciones_pago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cxp = new CxP();
        $cxp->id_suplidor = $request->get('suplidor');
        $cxp->fecha = $request->get('fecha');
        $cxp->id_condicion = $request->get('condicion_pago');

        $cxp->ncf = $request->get('ncf');
        $cxp->factura = $request->get('factura');
        $cxp->fecha_factura = $request->get('fecha_factura');
        $cxp->fecha_vencimiento = $request->get('fecha_vencimiento');

        $cxp->bruto = $request->get('bruto') == '' ? 0 : $request->get('bruto');
        $cxp->itbis = $request->get('itbis') == '' ? 0 : $request->get('itbis');
        $cxp->descuento = $request->get('descuento') == '' ? 0 : $request->get('descuento');
        $cxp->otros = $request->get('otros') == '' ? 0 : $request->get('otros');

        $cxp->concepto = $request->get('concepto');

        $cxp->save();
        return redirect('/cxp')->with('success','¡Registro guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CxP  $cxP
     * @return \Illuminate\Http\Response
     */
    public function show(CxP $cxP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CxP  $cxp
     * @return \Illuminate\Http\Response
     */
    public function edit(CxP $cxp)
    {
        return view('contabilidad.cxp.edit')->with('cxp',$cxp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CxP  $cxp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CxP $cxp)
    {
        request()->validate([
            'id'=>'required',
            'id_suplidor'=>'required',
            'fecha'=>'required',
            'id_condicion'=>'required',
            'ncf'=>'required',
            'factura'=>'required',
            'fecha_factura'=>'required',
            'fecha_vencimiento'=>'required',
            'bruto'=>'required',
            'itbis'=>'required',
            'descuento'=>'required',
            'otros'=>'required',
            'updated_at'=>now()
        ]);

        $cxp->update($request->all());
        return redirect('/cxp')->with('success','¡Registro de factura actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CxP  $cxP
     * @return \Illuminate\Http\Response
     */
    public function destroy(CxP $cxp)
    {
        $cxp->deleted_at = now();
        $cxp->save();
        $id = $cxp->id;
        return redirect('/cxp')->with('success','¡Registro de factura #'. $id.' borrado correctamente!');
    }
}
