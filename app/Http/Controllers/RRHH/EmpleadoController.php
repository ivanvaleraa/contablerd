<?php

namespace App\Http\Controllers\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Catalogos\AFP;
use App\Models\Catalogos\ARS;
use App\Models\Catalogos\Cargo;
use App\Models\Catalogos\Departamento;
use App\Models\Catalogos\EstCivil;
use App\Models\Catalogos\Horario;
use App\Models\Catalogos\NivelAcademico;
use App\Models\Catalogos\Nomina;
use App\Models\Catalogos\TipoEmpleado;
use App\Models\Catalogos\TipoPagoNomina;
use App\Models\Empleado;
use App\Models\Catalogos\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$request->input(); aqui verifico la key, el default sera '' (vacio) si no trae nada
        $nombre = $request->input('nombre','');
        $departamento_selected = $request->input('departamento','');
        $cargo_selected = $request->input('cargo','');
        $nomina_selected = $request->input('nomina','');

        //instanciamos desde el modelo Empleado el query builder
        $empleadosQuery = Empleado::with(['departamento','cargo','nomina']);

        //Ahora, vamos a chequear si los request tienen datos, para asi ir llenando el query si tiene datos
       /* CONDICION WHEN
       $empleadosQuery->when($request->filled('nombre'), function ($empleadosQuery, $nombre){
            $empleadosQuery->where('nombre', 'LIKE', "%".$request->get('nombre')."%");
        });*/

        if($request->filled('nombre')){
            $empleadosQuery->where('nombre', 'LIKE', "%".$request->get('nombre')."%");
        }

        if($request->filled('departamento')){
            $empleadosQuery->where('id_departamento','=',$request->get('departamento'));
        }

        if($request->filled('cargo')){
            $empleadosQuery->where('id_cargo','=',$request->get('cargo'));
        }

        if($request->filled('nomina')){
            $empleadosQuery->where('id_nomina','=',$request->get('nomina'));
        }

        $empleados = $empleadosQuery->whereNull('deleted_at')->get();
        return view('rrhh.empleado.index',compact('empleados','nombre', 'departamento_selected','cargo_selected','nomina_selected'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivel_academicos = NivelAcademico::orderBy('id')->get();
        $estado_civils = EstCivil::orderBy('id')->get();
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        $horarios = Horario::all();
        $tipo_empleados = TipoEmpleado::all();
        $tipo_pagos = TipoPagoNomina::all();
        $nominas = Nomina::all();
        $arss = ARS::all();
        $afps = AFP::all();
        $bancos = Banco::all();
        return view('rrhh.empleado.create', compact('nivel_academicos','estado_civils','departamentos',
            'cargos','horarios','tipo_empleados','tipo_pagos','nominas','arss','afps', 'bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'cedula' => str_replace('-','',$request->cedula),
            'nombre' => strtoupper($request->nombre),
            'apellido' => strtoupper($request->apellido)
        ]);

        request()->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'cedula'=>'required|unique:empleados|max:13',
            'fecha_ingreso'=>'required',
            'id_nivel_academico'=>'required',
            'id_estado_civil'=>'required',

            'id_departamento'=>'required',
            'id_cargo'=>'required',
            'id_horario'=>'required',
            'id_tipo_empleado'=>'required',

            'id_tipo_pago_nomina'=>'required',
            'id_nomina'=>'required',
            'sueldo'=>'required',
            'id_ars'=>'required',
            'id_afp'=>'required',

            'ars_empleado'=>'required',
            'ars_aporte'=>'required',
            'afp_empleado'=>'required',
            'afp_aporte'=>'required',
            'arl_aporte'=>'required',
        ]);

        Empleado::create($request->all());
        return redirect('/empleado')->with('success','¡Empleado guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {

        return view('rrhh.empleado.edit')->with('empleado',$empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->merge([
            'cedula' => str_replace('-','',$request->cedula),
            'nombre' => strtoupper($request->nombre),
            'apellido' => strtoupper($request->apellido)
        ]);

        request()->validate([
            'id'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'cedula'=>'required|max:13',
            'fecha_ingreso'=>'required',
            'id_nivel_academico'=>'required',
            'id_estado_civil'=>'required',

            'id_departamento'=>'required',
            'id_cargo'=>'required',
            'id_horario'=>'required',
            'id_tipo_empleado'=>'required',

            'id_tipo_pago_nomina'=>'required',
            'id_nomina'=>'required',
            'sueldo'=>'required',
            'id_ars'=>'required',
            'id_afp'=>'required',

            'ars_empleado'=>'required',
            'ars_aporte'=>'required',
            'afp_empleado'=>'required',
            'afp_aporte'=>'required',
            'arl_aporte'=>'required',
        ]);

        $empleado->update($request->all());
        return redirect('/empleado')->with('success','¡Empleado actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->deleted_at = now();
        $empleado->save();
        $id = $empleado->id;
        $nombre_completo = $empleado->nombre.' '.$empleado->apellido;

        return redirect('/empleado')->with('success','¡Empleado #'. $id.' '. $nombre_completo .' borrado correctamente!');
    }

}
