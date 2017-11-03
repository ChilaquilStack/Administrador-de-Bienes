@extends("layout.master")
@section("title","Agregar Credito Fiscal")
@section("content")
@include('modals.warning')
@include('modals.success')
{{--@include('modals.eliminar_credito')--}}
<div id="credito" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Registro Crédito Fiscal</h1>    
    </div>
    <div class="panel-body">
        {!!Form::open(["class"=>"form-inline", "rol"=>"form"])!!}
        	@include("creditos.form")
        {!!Form::close()!!}
    </div>
</div>
<div id="contribuyente" class="panel panel-primary">
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
                {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
                    @include('contribuyentes.form-fisica')
                    @include('domicilios.contribuyentes')
                {!! Form ::close() !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="moral">
                {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
                    @include('contribuyentes.form-moral')
                    @include('domicilios.contribuyentes')
                {!! Form ::close() !!}
            </div>
        </div>
    </div>
</div>
<div id="bienes" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Registro de bienes</h1>
    </div>
    <div class="panel-body">
        {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
            @include('bienes.form')
            <div class="form-group">
                <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
            <div class="panel-defaut">
                <div class="panel-heading">
                    <h1 class="panel-title">Bienes</h1>
                </div>
                @include('articulos.tabla-articulos-temporales')
            </div>
        </div>
        {!! Form ::close()!!}
    </div>
</div>
<div id="deposito" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Depositario</h1>
    </div>
    <div class="panel-body">
        {!!Form::open([ "class" => "form-inline", "role"=>"form" ]) !!}
            @include('depositos.form')
        {!!Form::close()!!}
	</div>
</div>
<div id="deposito" class="panel panel-primary">
	<div class="panel-footer">
		<button type="button" class="btn btn-success btn-sm" id="guardar_credito_fiscal">Guardar Credito</button>
		<button type="button" class="btn btn-default btn-sm">Cancelar</button>
	</div>
</div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
	{{Html::script("js/creditos.js")}}
@endsection