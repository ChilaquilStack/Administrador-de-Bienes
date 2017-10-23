@extends("layout.master")
@section("title","créditos fiscales")
@section("content")
@include('modals.warning')
@include('modals.success')
@include('modals.eliminar_credito')
<div id="registro_creditos_fiscales" style="display:none">
  @include('creditos.form')
  @include('contribuyentes.form')
  @include('bienes.form')
  <div class="form-group">        
    <div class="col-sm-offset-2 col-sm-10">
        <button id="guardar" type="button" class="btn btn-success btn-sm">Guardar</button>
    </div>
</div>
</div>
@include('creditos.tabla')
@endsection
@section("scripts")
  {{Html::script("js/script.js")}}
@endsection