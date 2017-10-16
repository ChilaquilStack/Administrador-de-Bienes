@extends("layout.master")
@section("content")
<form class="form-horizontal" role="form">
    <div class="form-group">
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
            <button id="guardar" class="btn btn-default">Guardar</button>
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Creditos">Creditos:</label>
      <div class="col-sm-10">
        @include('creditos.tabla')
      </div>
    </div>
</form>
@endsection
@section("scripts")
{{Html::script("js/script.js")}}
@endsection