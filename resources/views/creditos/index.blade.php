@extends("layout.master")
@section("title","creditos fiscales")
@section("content")
@include('modals.warning')
@include('modals.success')
@include('modals.eliminar_credito')
<form class="form-horizontal" role="form" id="creditos_fiscales_form">
    <input type="hidden" id="data" value="">
    <div class="form-group">
      <h1>Registrar Credito Fiscal</h1>
      <label class="control-label col-sm-2" for="folio">Credito Fiscal:</label>
      <div class="col-sm-10">
        <input class="form-control" id="folio" placeholder="Ingresar numero de credito fiscal" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="documento">Documento Determinante:</label>
      <div class="col-sm-10">
        <input class="form-control" id="documento" placeholder="Ingresar documento determinante" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="origen">Origen del Credito:</label>
      <div class="col-sm-10">          
        <input class="form-control" id="origen" placeholder="Ingresar origen del credito" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="monto">Monto:</label>
      <div class="col-sm-10">
        <input class="form-control" id="monto" type="number">
      </div>
    </div>
    <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
            <button id="guardar" type="button" class="btn btn-success btn-sm">Guardar</button>
        </div>
    </div>
</form>
@include('creditos.tabla')
@endsection
@section("scripts")
  {{Html::script("js/script.js")}}
@endsection