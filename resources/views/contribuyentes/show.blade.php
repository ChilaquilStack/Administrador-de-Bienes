@extends("layout.master")
@section("title","Contribuyente")
@section("content")
@include('layout.modals.success')
@include('layout.modals.eliminar_credito')
@include('layout.modals.eliminar_articulo')
    <input type="hidden" id="id_contribuyente" value = "{{$contribuyente->id}}">
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Contribuyente</h1>
            </div>
            <div class="panel panel-body">
                {!!Form::model($contribuyente, ["class" => "form-horizontal", "role" => "form"])!!}    
                    @if($contribuyente->razon_social)
                        @include("contribuyentes.form-moral")
                    @else
                        @include("contribuyentes.form-fisica")
                    @endif
                    @include("contribuyentes.info-comun")
                {!!Form::close()!!}
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Domicilio</h1>
            </div>
            <div class="panel panel-body">
                @if($domicilios->isEmpty())
                    {{"No existe ningun domicilio"}}
                    <button type="button" class="btn btn-success">Agregar Domicilio</button>
                @else
                    @foreach($domicilios as $domicilio)
                        {!!Form::model($domicilio, ["class" => "form-horizontal", "role" => "form"])!!}    
                            @include("domicilios.contribuyentes")
                        {!!Form::close()!!}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @include("creditos.tabla")
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/contribuyentes.js")}}
@endsection