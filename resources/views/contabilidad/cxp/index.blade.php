@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cuentas por Pagar</h1>
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
                        <label>Suplidor</label>
                        <select class="suplidor select2-hidden-accessible" style="width: 100%;" aria-hidden="true"
                                name="suplidor">
                            <option value="">Ninguno</option>
                            @foreach(\App\Models\Suplidor::all() as $suplidor)
                                <option
                                    value="{{$suplidor->id}}" {{$suplidor->id == $suplidor_selected ? 'selected' : ''}}>{{$suplidor->nombre}}</option>
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
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <a href="cxp/create"  class="btn btn-success"><i class="fas fa-plus"></i> Crear</a>
                </div>
            </div>
            <br>
        </div>
        <div class="card-body">
        <table class="table table-dark table striped mt-4" id="lista_cxp">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Suplidor</th>
                <th scope="col">Condición</th>
                <th scope="col">Fecha</th>
                <th scope="col">NCF</th>
                <th scope="col">Factura</th>
                <th scope="col">Fecha Factura</th>
                <th scope="col">Fecha Vencimiento</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cxps as $cxp)
                <tr>
                    <td>{{$cxp->id}}</td>
                    <td>{{$cxp->suplidor->nombre}}</td>
                    <td>{{$cxp->cat_condicion_pago->det}}</td>
                    <td>{{$cxp->fecha}}</td>
                    <td>{{$cxp->ncf}}</td>
                    <td>{{$cxp->factura}}</td>
                    <td>{{$cxp->fecha_factura}}</td>
                    <td>{{$cxp->fecha_vencimiento}}</td>
                    <td>
                        <form action="{{route('cxp.destroy',$cxp->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="/cxp/{{$cxp->id}}/edit">Editar</a>
                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#lista_cxp').DataTable({
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
            });

            let selects = ['suplidor']
            selects.forEach(function (item, index) {
                $('.' + item).select2()
            });

        });
    </script>
@stop

