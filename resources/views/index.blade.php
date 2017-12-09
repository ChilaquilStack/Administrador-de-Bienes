@extends("layout.master")
@section("title","créditos fiscales")
@include('layout.modals.warning')
@include('layout.modals.success')
@include('layout.modals.eliminar_credito')
@include('layout.modals.eliminar_articulo')
@section("content")
<div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div> 
            @endif
        </div>
        <div class="col-md-12" id="tabla_credito">
            @include('creditos.tabla')
        </div>
        <div class="col-md-12" id="articulos" style="display: none;">
            @include('articulos.tabla-articulos')
        </div>
        <div class="col-md-12" id="formulario_bienes" style="display: none;">
            @include('bienes.add')
        </div>
</div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/creditos.js")}} 
@endsection