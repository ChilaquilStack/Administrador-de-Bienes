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
                    <table class="table table-striped table-condensed">
                        <thead><tr><th>Crédito Fiscal</th><th>Origen del Crédito</th><th>Monto</th><th>Contribuyente</th><th>Número de control</th><th>Documento determinante</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>{{$credito->folio}}</td>
                                <td>{{$credito->origen_credito}}</td>
                                <td>${{number_format($credito->monto, 2)}}</td>
                                @if($credito->contribuyente->razon_social)
                                    <td>{{$credito->contribuyente->razon_social}}</td>
                                else
                                    <td>{{$credito->contribuyente->Nombre." ".$credito->contribuyente->Apellido_Paterno." ".$credito->contribuyente->Apellido_Materno}}</td>
                                @endif
                                <td>{{$credito->bienes->first()->numero_control}}</td>
                                <td>{{$credito->documento_determinante}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Artículo</h3>
                </div>
                <div class="panel-body">
                    {{Form::open(["action" => ["CreditosController@add", $credito->folio] , "method" => "post", "class" => "form-horizontal"])}}
                        @include("articulos.form")
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        </div>
                        <button type="submit" class="btn btn-success brtn-sm">Guardar</button>
                        @include('articulos.tabla-articulos-temporales')
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/sub_subsub_categorias.js")}}
    {{Html::script("js/crear_tabla.js")}}
@endsection