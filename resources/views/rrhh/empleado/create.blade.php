@extends('adminlte::page')

@section('title', 'ContableRD: Nuevo Empleado')

@section('content_header')
    <h1>Creación: Empleado</h1>
    <p>Estas en: <a href="/empleado">Empleado</a> > Creación</p>
@stop


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/empleado" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos Generales</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="id" class="form-label">ID</label>
                                    <input id="id" readonly placeholder="AUTOMATICO" name="id" type="text" class="form-control" tabindex="1">
                                </div>
                                <div class="col-md-5">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{old('nombre')}}">
                                </div>

                                <div class="col-md-5">
                                    <label for="nombre" class="form-label">Apellido</label>
                                    <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2" value="{{old('apellido')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="cedula" class="form-label">Cedula</label>
                                    <input id="cedula" name="cedula" type="text" class="form-control" tabindex="2" value="{{old('cedula')}}">
                                </div>
                                <div class="col-md-5">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" tabindex="2" value="{{old('fecha_nacimiento')}}">
                                </div>
                                <div class="col-md-5">
                                    <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                                    <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" tabindex="2" value="{{old('fecha_ingreso')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="nivel_academico" class="form-label">Nivel Academico</label>
                                    <br>
                                    <select class="form-control select2" name="id_nivel_academico" id="id_nivel_academico" style="width: 100%" value="{{old('nivel_academico')}}">
                                        @foreach($nivel_academicos as $nivel_academico)
                                            <option value="{{$nivel_academico->id}}">{{$nivel_academico->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="estado_civil" class="form-label">Estado Civil</label>
                                    <br>
                                    <select class="form-control select2" name="id_estado_civil" id="id_estado_civil" style="width: 100%" value="{{old('estado_civil')}}">
                                        @foreach($estado_civils as $estado_civil)
                                            <option value="{{$estado_civil->id}}">{{$estado_civil->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input id="celular" name="celular" type="text" class="form-control" tabindex="2" value="{{old('celular')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input id="telefono" name="telefono" type="text" class="form-control" tabindex="2" value="{{old('telefono')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Información Laboral</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="departamento" class="form-label">Departamento</label>
                                    <br>
                                    <select class="form-control select2" name="id_departamento" id="id_departamento" style="width: 100%" value="{{old('departamento')}}">
                                        @foreach($departamentos as $departamento)
                                            <option value="{{$departamento->id}}">{{$departamento->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cargo" class="form-label">Cargo</label>
                                    <br>
                                    <select class="form-control select2" name="id_cargo" id="id_cargo" style="width: 100%" value="{{old('cargo')}}">
                                        @foreach($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cargo" class="form-label">Horario</label>
                                    <br>
                                    <select class="form-control select2" name="id_horario" id="id_horario" style="width: 100%" value="{{old('horario')}}">
                                        @foreach($horarios as $horario)
                                            <option value="{{$horario->id}}">{{$horario->det}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="cargo" class="form-label">Tipo Empleado</label>
                                    <br>
                                    <select class="form-control select2" name="id_tipo_empleado" id="id_tipo_empleado" style="width: 100%" value="{{old('tipo_empleado')}}">
                                        @foreach($tipo_empleados as $tipo_empleado)
                                            <option value="{{$tipo_empleado->id}}">{{$tipo_empleado->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inicio_afp" class="form-label">Inicio AFP</label>
                                    <input id="inicio_afp" name="inicio_afp" type="date" class="form-control" tabindex="2" value="{{old('inicio_afp')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inicio_ars" class="form-label">Inicio ARS</label>
                                    <input id="inicio_ars" name="inicio_ars" type="date" class="form-control" tabindex="2" value="{{old('inicio_ars')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Información de Nómina</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tipo_pago" class="form-label">Tipo de Pago</label>
                                    <br>
                                    <select class="form-control select2" name="id_tipo_pago_nomina" id="id_tipo_pago_nomina" style="width: 100%" value="{{old('tipo_pago')}}">
                                        @foreach($tipo_pagos as $tipo_pago)
                                            <option value="{{$tipo_pago->id}}">{{$tipo_pago->det}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="tipo_nomina" class="form-label">Nómina</label>
                                    <br>
                                    <select class="form-control select2" name="id_nomina" id="id_nomina" style="width: 100%" value="{{old('nomina')}}">
                                        @foreach($nominas as $nomina)
                                            <option value="{{$nomina->id}}">{{$nomina->det}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="sueldo" class="form-label">Sueldo</label>
                                    <input id="sueldo" name="sueldo" type="number" onkeyup="calcularSueldoDiario(this.value)" class="form-control" tabindex="2" value="{{old('sueldo')}}">
                                </div>

                                <div class="col-md-3">
                                    <label for="sueldo_diario" class="form-label">Sueldo Diario (Automático)</label>
                                    <input id="sueldo_diario" readonly name="sueldo_diario" type="text" class="form-control" tabindex="2">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="referencia" class="form-label">Referencia</label>
                                    <input id="referencia" name="referencia" type="text" class="form-control" tabindex="2" value="{{old('referencia')}}">
                                </div>

                                <div class="col-md-3">
                                    <label for="cuenta_contable" class="form-label">Cuenta Contable</label>
                                    <input id="cuenta_contable" name="cuenta_contable" type="text" class="form-control" tabindex="2" value="{{old('cuenta_contable')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo_nomina" class="form-label">ARS</label>
                                    <br>
                                    <select class="form-control select2" name="id_ars" id="id_ars" style="width: 100%" value="{{old('ars')}}">
                                        @foreach($arss as $ars)
                                            <option value="{{$ars->id}}">{{$ars->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="afp" class="form-label">AFP</label>
                                    <br>
                                    <select class="form-control select2" name="id_afp" id="id_afp" style="width: 100%" value="{{old('afp')}}">
                                        @foreach($afps as $afp)
                                            <option value="{{$afp->id}}">{{$afp->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cuenta_electronica" class="form-label">Cuenta Electronica</label>
                                    <input id="cuenta_electronica" name="cuenta_electronica" type="text" class="form-control" tabindex="2" value="{{old('cuenta_electronica')}}">
                                </div>

                                <div class="col-md-3">
                                    <label for="afp" class="form-label">Banco</label>
                                    <br>
                                    <select class="form-control select2" name="id_banco" id="id_banco" style="width: 100%" value="{{old('banco')}}">
                                        @foreach($bancos as $banco)
                                            <option value="{{$banco->id}}">{{$banco->det}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <h5><b><i>Tesorería de la Seguridad Social</i></b></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ars_empleado" class="form-label">ARS Empleado</label>
                                    <input id="ars_empleado" step="any" name="ars_empleado" type="number" onkeyup="" class="form-control" value="0.00" tabindex="2" >
                                </div>
                                <div class="col-md-3">
                                    <label for="ars_aporte" class="form-label">ARS Aporte</label>
                                    <input id="ars_aporte" step="any" name="ars_aporte" type="number" onkeyup="" class="form-control" value="0.00" tabindex="2">
                                </div>
                                <div class="col-md-3">
                                    <label for="afp_empleado" class="form-label">AFP Empleado</label>
                                    <input id="afp_empleado" step="any" name="afp_empleado" type="number" onkeyup="" class="form-control" value="0.00" tabindex="2">
                                </div>
                                <div class="col-md-3">
                                    <label for="afp_aporte" class="form-label">AFP Aporte</label>
                                    <input id="afp_aporte" step="any" name="afp_aporte" type="number" onkeyup="" class="form-control" value="0.00" tabindex="2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="arl_aporte" class="form-label">ARL Aporte</label>
                                    <input id="arl_aporte" step="any" name="arl_aporte" type="number" onkeyup="" class="form-control" value="0.00" tabindex="2">
                                </div>

                                <div class="col-md-3" style="padding-top: 8px;">
                                    <br>
                                    <a class="btn btn-success"  style="width: 100%" onclick="calcularTSS()">
                                        <i class="fas fa-sync-alt"></i>
                                        Actualizar TSS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-success" tabindex="10">Guardar</button>
        <a href="/empleado" class="btn btn-danger" tabindex="9">Cancelar</a>
        <br>

    </form>
@stop

@section('js')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $("#id_departamento").select2({
            language: "es"
        });
        $("#id_cargo").select2({
            language: "es"
        });

        $("#id_banco").select2({
            language: "es"
        });

        function calcularSueldoDiario(sueldo){
            var dt = new Date();
            //Date() empieza desde 0, asi que hay que sumarle 1 para conseguir el mes actual
            var month = dt.getMonth()+1;
            var year = dt.getFullYear();
            daysInMonth = new Date(year, month, 0).getDate();
            sueldo_diario = sueldo/daysInMonth;
            document.getElementById('sueldo_diario').value = sueldo_diario.toFixed(2);
        }

        let selectores = ['celular', 'telefono','cedula'];
        selectores.forEach(function(item, index){
            var selector = document.getElementById(item);
            var im = new Inputmask("(999)-999-9999");
            if(index == 2){
                var im = new Inputmask("999-9999999-9")
            }
            im.mask(selector);
        });

        function calcularTSS(){
            sueldo = document.getElementById('sueldo').value;
            //ARS
            document.getElementById('ars_aporte').value = (sueldo * 0.0709).toFixed(2);
            document.getElementById('ars_empleado').value = (sueldo * 0.0304).toFixed(2);
            //AFP
            document.getElementById('afp_aporte').value = (sueldo * 0.0710).toFixed(2);
            document.getElementById('afp_empleado').value = (sueldo * 0.0287).toFixed(2);
            //ARL
            document.getElementById('arl_aporte').value = (sueldo * 0.0100).toFixed(2);
        }

    </script>

@stop
