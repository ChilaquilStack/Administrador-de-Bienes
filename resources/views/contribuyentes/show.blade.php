@extends("layout.master")
@section("title","Contribuyente")
@section("content")
    <input type="hidden" id="id_contribuyente" value = "{{$contribuyente->id}}">
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
    <div class="panel panel-default">
        <button type="button" class="btn btn-success btn-sm">Guardar</button>
        <button type="button" class="btn btn-default btn-sm">Cancelar</button>
    </div>
    <div class="panel panel-default">
        @include("creditos.tabla")
    </div>
    <div class="panel panel-default">
        @include("articulos.tabla-articulos")
    </div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/contribuyentes.js")}}
@endsection