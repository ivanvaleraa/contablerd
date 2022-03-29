<?php
$departamentos = \App\Models\Catalogos\Departamento::all();
$cargos = \App\Models\Catalogos\Cargo::all();
$nominas = \App\Models\Catalogos\Nomina::all();

?>

@extends('adminlte::page')

@section('title', 'Listado de Empleados')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
    @include('components.flash-message')
    <!-- BUSCADOR -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Busqueda Avanzada</h3>
        </div>
        <form action="#" method="GET">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md">
                        <label>Nombre</label>
                        <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder=""
                               value="{{$nombre}}">
                    </div>

                    <div class="col-md">
                        <label>Departamento</label>
                        <select class="departamento select2-hidden-accessible" style="width: 100%;" aria-hidden="true"
                                name="departamento">
                            <option value="">Ninguno</option>
                            @foreach($departamentos as $departamento)
                                <option
                                    value="{{$departamento->id}}" {{$departamento->id == $departamento_selected ? 'selected' : ''}}>{{$departamento->det}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md">
                        <label>Cargo</label>
                        <select class="cargo select2-hidden-accessible" style="width: 100%;" aria-hidden="true"
                                name="cargo">
                            <option value="">Ninguno</option>
                            @foreach($cargos as $cargo)
                                <option
                                    value="{{$cargo->id}}" {{$cargo->id == $cargo_selected ? 'selected' : ''}}>{{$cargo->det}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md">
                        <label>Nomina</label>
                        <select class="nomina select2-hidden-accessible" style="width: 100%;" aria-hidden="true"
                                name="nomina">
                            <option value="">Ninguno</option>
                            @foreach($nominas as $nomina)
                                <option
                                    value="{{$nomina->id}}" {{$nomina->id == $nomina_selected ? 'selected' : ''}}>{{$nomina->det}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar</button>
            </div>
        </form>
    </div>
    <!-- TERMINAR BUSCADOR -->

    <!-- TABLA -->
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <a href="empleado/create" class="btn btn-success"><i class="fas fa-plus"></i> Crear</a>
                </div>
            </div>
            <br>
        </div>
        <div class="card-body">
            <table class="table table-dark table striped mt-4" id="lista_empleados">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Nomina</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">TSS</th>
                    <th scope="col">Neto</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{$empleado->id}}</td>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->apellido}}</td>
                        <td>{{$empleado->departamento->det}}</td>
                        <td>{{$empleado->cargo->det}}</td>
                        <td>{{$empleado->nomina->det}}</td>
                        <td>{{number_format($empleado->sueldo,2)}}</td>
                        <td>{{number_format($empleado->ars_empleado+$empleado->afp_empleado,2)}}</td>
                        <td>{{number_format($empleado->sueldo-($empleado->ars_empleado-$empleado->afp_empleado),2)}}</td>
                        <td>
                            <form action="{{route('empleado.destroy', $empleado->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="/empleado/{{$empleado->id}}/edit">Editar</a>
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- TERMINA TABLA -->
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#lista_empleados').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json'
                },
                responsive: true,
                dom: 'Bfrtilp',
                buttons: [
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info'
                    },
                    {
                        extend:    'copy',
                        text:      '<i class="fa fa-copy"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-primary'
                    },
                ]
            })
/*
                }*/
            //AGREGAR CUALQUIER CLASE NUEVA EN EL DOM EN EL ARREGLO SELECTS
            let selects = ['departamento', 'cargo', 'nomina']
            selects.forEach(function (item, index) {
                $('.' + item).select2()
            });
        });
    </script>
@stop
