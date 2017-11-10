@extends("layout.master")
@section("title", "Agregar Bienes")
@section("content")
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table">
            <thead><tr><th>Crédifo Fiscal</th><th>Origen del Credito</th><th>Monto</th><th>Contribuyente</th><th>Numero de control</th><th>Documento determinante</th></tr></thead>
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
    {!!Form::open(["class" => "form-horizontal"])!!}
        @include("articulos.form")
        <button type="button" class="btn btn-success btn-sm">Guardar</button>
    {!!Form::close()!!}
@endsection
@section("scripts")
    {{Html::script("js/articulos.js")}}
@endsection