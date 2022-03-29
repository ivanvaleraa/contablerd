
@extends('adminlte::page')
@section('title', 'ContableRD: Edición CXP')

@section('content_header')
    <h1>Edición: Cuenta por pagar</h1>
    <p>Estas en: <a href="/cxp">Cuentas por Pagar</a> > Edición</p>

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
    <form action="/cxp/{{$cxp->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-2">
                <label for="id" class="form-label">ID</label>
                <input id="id" readonly value="{{$cxp->id}}" name="id" type="text" class="form-control" tabindex="1">
            </div>

            <div class="col-md-10">
                <label for="suplidor" class="form-label">Suplidor</label>
                <br>
                <select class="form-select" name="id_suplidor" id="id_suplidor" style="width: 100%">
                    @foreach(\App\Models\Suplidor::all() as $suplidor)
                        <option value="{{$suplidor->id}}"
                            {{$suplidor->id == $cxp->id_suplidor ? 'selected' : ''}}>{{$suplidor->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="fecha" class="form-label">Fecha</label>
                <input id="fecha" name="fecha" value="{{$cxp->fecha}}" type="date" class="form-control" tabindex="3">
            </div>

            <div class="col-md-8">
                <label for="condicion" class="form-label">Condición</label>
                <br>
                <select class="form-select" name="id_condicion" id="id_condicion" style="width: 100%">
                    @foreach(\App\Models\CondicionPago::all() as $condicion)
                        <option value="{{$condicion->id}}"
                            {{$condicion->id == $condicion->id_condicion ? 'selected' : ''}}>{{$condicion->det}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="ncf" class="form-label">No. Comprobante Fiscal</label>
                <input id="ncf" name="ncf" value="{{$cxp->ncf}}" type="text" class="form-control" tabindex="5">
            </div>

            <div class="col-md-6">
                <label for="factura" class="form-label">No. Factura</label>
                <input id="factura" name="factura" value="{{$cxp->factura}}" type="text" class="form-control" tabindex="5">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="fecha_factura" class="form-label">Fecha Factura</label>
                <input id="fecha_factura" name="fecha_factura" value="{{$cxp->fecha_factura}}" type="date" class="form-control" tabindex="7">
            </div>
            <div class="col-md-6">
                <label for="fecha_vencimiento" class="form-label">Fecha Vencimiento</label>
                <input id="fecha_vencimiento" name="fecha_vencimiento" value="{{$cxp->fecha_vencimiento}}" type="date" class="form-control" tabindex="8">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="bruto" class="form-label">Bruto</label>
                <input id="bruto" name="bruto" type="number" value="{{$cxp->bruto}}" class="form-control" placeholder="0.00" step=".01" tabindex="9">
            </div>
            <div class="col-md-3">
                <label for="itbis" class="form-label">ITBIS</label>
                <input id="itbis" name="itbis" type="number" value="{{$cxp->itbis}}" class="form-control" placeholder="0.00" step=".01" tabindex="10">
            </div>
            <div class="col-md-3">
                <label for="descuento" class="form-label">Descuentos</label>
                <input id="descuento" name="descuento" value="{{$cxp->descuento}}" type="number" class="form-control" placeholder="0.00" step=".01" tabindex="11">
            </div>
            <div class="col-md-3">
                <label for="otros" class="form-label">Otros</label>
                <input id="otros" name="otros" value="{{$cxp->otros}}" type="number" class="form-control" placeholder="0.00" step=".01" tabindex="12">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <label for="concepto">Concepto</label>
                <textarea class="form-control rounded-1" id="concepto" name="concepto" rows="5">{{$cxp->concepto}}</textarea>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success" tabindex="10">Guardar</button>
        <a href="/cxp" class="btn btn-danger" tabindex="9">Cancelar</a>
        <br>

    </form>
@stop

@section('js')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $("#id_suplidor").select2({
            language: "es"
        });

        $("#id_condicion").select2({
            language: "es"
        });
    </script>

@stop
