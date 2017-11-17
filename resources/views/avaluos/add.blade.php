@extends("layout.master")
@section("title", "Avaluos" )
@section("css")
    {{Html::style("css/wickedpicker.css")}}
    {{Html::style("//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css")}}
@endsection
@section("content")
@include('layout.modals.warning')
@include('layout.modals.success')
<input type="hidden" value="{{$articulo->id}}" id="id_articulo">

<div class="panel-group">

    @include("layout.credito-details")

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Bien</h1>    
        </div>
        <div class="panel-body">
            {!!Form::model($articulo,["class" => "form-horizontal"])!!}
                @include("articulos.form")
            {!!Form::close()!!}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Avaluo</h1>
        </div>
        <div class = "panel-body">
            {!!Form::open(["class" => "form-horizontal", "role" => "form"])!!}
                @include("avaluos.form")
            {!!Form::close()!!}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Perito</h1>
        </div>
        <div class = "panel-body">
            {!!Form::open(["class" => "form-horizontal", "role" => "form"])!!}
                @include("peritos.form")
            {!!Form::close()!!}
        </div>
    </div>
        
    <button type="button" class="btn btn-success btn-sm" id="enviar">Guardar</button>
</div>
@endsection
@section("scripts")
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/avaluos.js")}}
@endsection