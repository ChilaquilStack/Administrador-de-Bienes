    <input type="hidden" id="data" value="">
        <div class="form-group">
        <label for="folio">Credito Fiscal:</label><input class="form-control" id="folio" placeholder="numero de credito fiscal" type="text">
  </div>
  <div class="form-group">
    <label for="documento">Documento Determinante:</label>
    <input class="form-control" id="documento" placeholder="documento determinante" type="text">
  </div>
  <div class="form-group">
    <label for="origen">Origen del Credito:</label>
    <select name="origen" id="origen">
    @foreach($origenes as $origen)
      <option value="{{$origen}}" selected>{{$origen}}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="monto">Monto:</label>
    <input class="form-control" id="monto" type="number" placeholder="$">
  </div>
{!!Form::close()!!}