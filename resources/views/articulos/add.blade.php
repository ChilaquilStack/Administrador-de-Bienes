@extends("layout.master")
@section("title", "Agregar Bienes")
@section("css")
    {{Html::style("css/dropzone.css")}}
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Crédito Fiscal</h1>
                </div>
                <div class="panel-body">
                    <div class="table-resonsive">
                        <table class="table table-striped table-condensed">
                            <thead><tr><th>Crédito Fiscal</th><th>Origen del Crédito</th><th>Monto</th><th>Contribuyente</th><th>Documento determinante</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td>{{$credito->folio}}</td>
                                    <td>{{$credito->origen_credito}}</td>
                                    <td>${{number_format($credito->monto, 2)}}</td>
                                    @if($credito->contribuyente->razon_social)
                                        <td>{{$credito->contribuyente->razon_social}}</td>
                                    @else
                                        <td>{{$credito->contribuyente->nombre." ".$credito->contribuyente->apellido_paterno." ".$credito->contribuyente->apellido_materno}}</td>
                                    @endif
                                    <td>{{$credito->documento_determinante}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Artículo</h3>
                    </div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-horizontal", "id"=>"formulario_bienes"])}}
                            @include("articulos.form")
                        {{Form::close()}}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        </div>
                        @include('articulos.tabla-articulos-temporales')
                    </div>
                </div>
                <div class="panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Deposito
                        </h1>
                    </div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-inline", "id"=>"formulario_deposito"])}}
                            @include("domicilios.deposito")
                        {{Form::close()}}
                    </div>
                </div>
                <div class="panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Depositario
                        </h1>
                    </div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-inline", "id"=>"formulario_depositario"])}}
                            @include("depositos.form");
                        {{Form::close()}}
                    </div>
                </div>
                <button type="button" id="guardar" class="btn btn-success brtn-sm">Guardar</button>
        </div>
    </div>
</div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/sub_subsub_categorias.js")}}
    {{Html::script("js/script.js")}}
@endsection