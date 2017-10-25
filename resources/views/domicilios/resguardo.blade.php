<div class="form-group">
  <div>
    <label class="control-label" for="nombre">Estado:</label>
    <select id="estado">
    @foreach($estados as $estado)
      <option value="{{$estado->id}}">{{$estado->nombre}}</option>
    @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <div>
  <label class="control-label" for="nombre">Municipio:</label>
  <select id="municipio">
    @foreach($municipios as $municipio)
    <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
    @endforeach
  </select>
</div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="coloniac">Colonia:</label>
    <input class="form-control" id="colonia" placeholder="Ingrese la colonia" type="text">
  </div>
</div>
<div class="form-group">
  <div>
      <label class="control-label" for="codigo_postal">Codigo postal:</label>
      <input class="form-control" id="codigo_postal" placeholder="Ingrese el codigo postal" type="text">
  </div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="int">Numero Interio:</label>
    <input class="form-control" id="int" placeholder="Ingrese el numero interio" type="text">
  </div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="ext">Numero Exterior:</label>
    <input class="form-control" id="ext" type="text" placeholder="Ingrese el numero exterior">
  </div>
</div>
<div class="form-group">
  <div>
    <label class="control-label" for="calle">Calle:</label>
    <input class="form-control" id="calle" type="text" placeholder="Ingrese la calle">
  </div>
</div>