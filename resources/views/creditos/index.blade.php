@extends("layout.master")
@section("title","créditos fiscales")
@section("content")
  @include('modals.warning')
  @include('modals.success')
@include('modals.eliminar_credito')
<div id="registro_creditos_fiscales" style="display:none">
    {!! Form::open([ "class"=>"form-inline", "role"=>"form" ]) !!}
        @include('creditos.add')
    {!!Form::close()!!}
    {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
        @include('contribuyentes.add')
        @include('bienes.form')
        <div class="form-group">
            <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
            <div class="col-sm-10">
                @include('bienes.tabla-crear')
            </div>
        </div>
    {!!Form::close()!!}
    {!!Form::open([ "class"=>"form-inline", "role"=>"form" ]) !!}
        @include('depositos.form')
        <div class="form-group">
            <div class="col-sm-10">
                <button id="guardar" type="button" class="btn btn-success btn-lg">Guardar Credito</button>
            </div>
        </div>
    {!!Form::close()!!}    
</div>
@include('creditos.tabla')
@include('bienes.tabla-creados')
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/creditos.js")}}  
@endsection