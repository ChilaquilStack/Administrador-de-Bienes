@extends("layout.master")
@section("title","Agregar Credito Fiscal")
@section("content")
@include('layout.modals.warning')
@include('layout.modals.success')

<div class="panel-group">
    
    <div id="credito" class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Registro Crédito Fiscal</h1>    
        </div>
        <div class="panel-body">
            {!!Form::open(["class"=>"form-inline", "rol"=>"form", "id" => "formulario_credito"])!!}
        	    @include("creditos.form")
            {!!Form::close()!!}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Registro del Contribuyente</h1>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#fisica" aria-controls="home" role="tab" data-toggle="tab">Fisica</a></li>
                <li role="presentation"><a href="#moral" aria-controls="profile" role="tab" data-toggle="tab">Moral</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="fisica">
                    {{ Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) }}
                        @include('contribuyentes.form-fisica')
                        @include('contribuyentes.info-comun')
                        @include('domicilios.contribuyentes')
                    {{ Form ::close() }}
                </div>
                <div role="tabpanel" class="tab-pane" id="moral">
                    {{Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) }}
                        @include('contribuyentes.form-moral')
                        @include('contribuyentes.info-comun')
                        @include('domicilios.contribuyentes')
                    {{ Form ::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Registro de bienes</h1>
        </div>
        <div class="panel-body">
            {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
                @include('articulos.form')
                <div class="form-group">
                    <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
                </div>
                @include('articulos.tabla-articulos-temporales')
            {!! Form ::close()!!}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Depositario</h1>
        </div>
        <div class="panel-body">
            {!!Form::open([ "class" => "form-inline", "role"=>"form" ]) !!}
                @include('depositos.form')
            {!!Form::close()!!}
	    </div>
    </div>


    <div class="panel panel-primary">
	    <div class="panel-footer">
		    <button type="button" class="btn btn-success btn-sm" id="guardar_credito_fiscal">Guardar</button>
	    </div>
    </div>

</div>

@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/sub_subsub_categorias.js")}}
    {{Html::script("js/crear_tabla.js")}}
@endsection