@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Creación: Cuenta por pagar</h1>
@stop

@section('content')
    <form action="/cxp" method="POST">
        @csrf
        <div class="row">
           <div class="col-md-2">
                <label for="id" class="form-label">ID</label>
                <input id="id" readonly placeholder="AUTOMATICO" name="id" type="text" class="form-control" tabindex="1">
           </div>

            <div class="col-md-10">
                <label for="suplidor" class="form-label">Suplidor</label>
                <br>
                <select class="form-select" name="suplidor" id="suplidor" style="width: 100%">
                    @foreach($suplidores as $suplidor)
                        <option value="{{$suplidor->id}}">{{$suplidor->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="fecha" class="form-label">Fecha</label>
                <input id="fecha" name="fecha" type="date" class="form-control" tabindex="3">
            </div>

            <div class="col-md-8">
                <label for="condicion" class="form-label">Condición</label>
                <br>
                <select class="form-select" name="condicion_pago" id="condicion_pago" style="width: 100%">
                    @foreach($condiciones_pago as $condicion_pago)
                        <option value="{{$condicion_pago->id}}">{{$condicion_pago->det}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="ncf" class="form-label">No. Comprobante Fiscal</label>
                <input id="ncf" name="ncf" type="text" class="form-control" tabindex="5">
            </div>

            <div class="col-md-6">
                <label for="factura" class="form-label">No. Factura</label>
                <input id="factura" name="factura" type="text" class="form-control" tabindex="5">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="fecha_factura" class="form-label">Fecha Factura</label>
                <input id="fecha_factura" name="fecha_factura" type="date" class="form-control" tabindex="7">
            </div>
            <div class="col-md-6">
                <label for="fecha_vencimiento" class="form-label">Fecha Vencimiento</label>
                <input id="fecha_vencimiento" name="fecha_vencimiento" type="date" class="form-control" tabindex="8">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="bruto" class="form-label">Bruto</label>
                <input id="bruto" name="bruto" type="number" class="form-control" placeholder="0.00" step=".01" tabindex="9">
            </div>
            <div class="col-md-3">
                <label for="itbis" class="form-label">ITBIS</label>
                <input id="itbis" name="itbis" type="number" class="form-control" placeholder="0.00" step=".01" tabindex="10">
            </div>
            <div class="col-md-3">
                <label for="descuento" class="form-label">Descuentos</label>
                <input id="descuento" name="descuento" type="number" class="form-control" placeholder="0.00" step=".01" tabindex="11">
            </div>
            <div class="col-md-3">
                <label for="otros" class="form-label">Otros</label>
                <input id="otros" name="otros" type="number" class="form-control" placeholder="0.00" step=".01" tabindex="12">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <label for="concepto">Concepto</label>
                <textarea class="form-control rounded-1" id="concepto" name="concepto" rows="5"></textarea>
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
        $("#suplidor").select2({
            language: "es"
        });

        $("#condicion_pago").select2({
            language: "es"
        });
    </script>

@stop
