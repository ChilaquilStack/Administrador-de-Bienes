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
                                <td>{{$credito->contribuyente->Nombre." ".$credito->contribuyente->Apellido_Paterno." ".$credito->contribuyente->Apellido_Materno}}</td>
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
                        <button type="submit" class="btn btn-success brtn-sm">Guardar</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
    {{Html::script("js/articulos.js")}}
    {{Html::script("js/sub_subsub_categorias.js")}}
@endsection