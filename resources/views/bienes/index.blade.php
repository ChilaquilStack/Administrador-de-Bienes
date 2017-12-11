@extends("layout.master")
@section("title","Bienes")
@section("content")
@include('layout.modals.warning')
@include('layout.modals.success')
@include('layout.modals.eliminar_credito')
@include('layout.modals.eliminar_articulo')
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    @include("articulos.tabla-articulos")
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}    
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/bienes.js")}}
@endsection