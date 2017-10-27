<div class="form-group">
  <div>
    <label class="control-label" for="estado_resguardo">Estado:</label>
    <select id="estado_resguardo">
    @foreach($estados as $estado)
      <option value="{{$estado->id}}">{{$estado->nombre}}</option>
    @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <div>
  <label class="control-label" for="municipio_resguardo">Municipio:</label>
  <select id="municipio">
    @foreach($municipios as $municipio)
    <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
    @endforeach
  </select>
</div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="colonia_resguardo">Colonia:</label>
    <input class="form-control" id="colonia_resguardo" placeholder="Ingrese la colonia" type="text">
  </div>
</div>
<div class="form-group">
  <div>
      <label class="control-label" for="codigo_postal_resguardo">Codigo postal:</label>
      <input class="form-control" id="codigo_postal_resguardo" placeholder="Ingrese el codigo postal" type="text">
  </div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="int_resguardo">Numero Interio:</label>
    <input class="form-control" id="int_resguardo" placeholder="Ingrese el numero interio" type="text">
  </div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="ext_resguardo">Numero Exterior:</label>
    <input class="form-control" id="ext" type="text" placeholder="Ingrese el numero exterior">
  </div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="calle_resguardo">Calle:</label>
    <input class="form-control" id="calle_resguardo" type="text" placeholder="Ingrese la calle">
  </div>
</div>