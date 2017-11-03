@extends("layout.master")
@section("title", "Avaluos" )
@section("content")
    {!!Form::model($articulo,["class" => "form-horizontal"])!!}
        <input type="hidden" value="{{$articulo->id}}" id="id_articulo">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Bien</h1>    
            </div>
            <div class="panel-body">
                @include("articulos.form")
            </div>
        </div>
    {!!Form::close()!!}
    {!!Form::open(["class" => "form-horizontal", "role" => "form"])!!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Avaluo</h1>
            </div>
            <div class = "panel-body">
                @include("avaluos.form")
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Perito</h1>
            </div>
            <div class = "panel-body">
                @include("peritos.form")
            </div>
        </div>
        <button type="button" class="btn btn-success btn-sm" id="enviar">Guardar</button>
    {!!Form::close()!!}
@endsection
@section("scripts")
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/avaluos.js")}}
@endsection