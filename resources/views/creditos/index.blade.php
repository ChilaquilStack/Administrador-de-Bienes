@extends("layout.master")
@section("title","créditos fiscales")
@section("content")
    {{--@include('modals.warning')--}}
    {{--@include('modals.success')--}}
    {{--@include('modals.eliminar_credito')--}}
    @include('creditos.tabla')
    @include('bienes.tabla-articulos')
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/creditos.js")}}  
@endsection