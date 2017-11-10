@extends("layout.master")
@section("title","créditos fiscales")
@include('layout.modals.warning')
@include('layout.modals.success')
@include('layout.modals.eliminar_credito')
@include('layout.modals.eliminar_articulo')
@section("content")
    @include('creditos.tabla')
    @include('articulos.tabla-articulos')
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/creditos.js")}}  
@endsection