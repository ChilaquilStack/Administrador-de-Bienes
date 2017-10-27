<div class="form-group">
    <label class="control-label col-sm-2" for="nombre">Estado:</label>
    <div class="col-sm-10">
        <select id="estado">
            @foreach($estados as $estado)
            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
        <label class="control-label col-sm-2" for="nombre">Municipio:</label>
        <div class="col-sm-10">
            <select id="municipio">
                @foreach($municipios as $municipio)
                <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                @endforeach
            </select>
        </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="colonia">Colonia:</label>
    <div class="col-sm-10">
        <input class="form-control" id="colonia" placeholder="Ingrese la colonia" type="text">
    </div>
</div>
<div class="form-group">
      <label class="control-label col-sm-2" for="codigo_postal">Codigo postal:</label>
      <div class="col-sm-10">
        <input class="form-control" id="codigo_postal" placeholder="Ingrese el codigo postal" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="int">Numero Interio:</label>
      <div class="col-sm-10">
        <input class="form-control" id="int" placeholder="Ingrese el numero interio" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ext">Numero Exterior:</label>
      <div class="col-sm-10">
        <input class="form-control" id="ext" type="text" placeholder="Ingrese el numero exterior">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="calle">Calle:</label>
      <div class="col-sm-10">
        <input class="form-control" id="calle" type="text" placeholder="Ingrese la calle">
      </div>
    </div>