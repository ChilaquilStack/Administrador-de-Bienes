@extends("layout.master")
@section("title","créditos fiscales")
@section("content")
    @include('creditos.tabla')
    @include('articulos.tabla-articulos')
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/creditos.js")}}  
@endsection