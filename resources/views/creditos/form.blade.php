<form class="form-horizontal" role="form">
    <input type="hidden" id="data" value="">
    <div class="form-group">
      <h1>Registro Crédito Fiscal</h1>
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
        <select name="origen" id="origen">
          @foreach($origenes as $origen)
            <option value="{{$origen}}" selected>{{$origen}}</option>
          @endforeach
          </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="monto">Monto:</label>
      <div class="col-sm-10">
        <input class="form-control" id="monto" type="number" placeholder="$">
      </div>
    </div>
</form>