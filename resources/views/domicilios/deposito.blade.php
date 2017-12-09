<div class="form-group">
    <div>
        <label class="control-label" for="estado_deposito">Estado:</label>
        <select id="estado_deposito" name="estado">
            @foreach($estados as $estado)
                @if($estado->id == 14)
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div>
        <label class="control-label" for="municipio_deposito">Municipio:</label>
        <select id="municipio_deposito" name="municipio">
            <option value="">Seleccione un municipio</option>
            @foreach($municipios as $municipio)
                <option id = "{{$municipio->id}}">{{$municipio->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div>
        <label class="control-label" for="colonia_deposito">Colonia:</label>
        {{Form::text("colonia", null, ["class" => "form-control", "id"=>"colonia_deposito", "placeholder"=>"Ingrese la colonia"])}}
    </div>
</div>

<div class="form-group">
  <div>
      <label class="control-label" for="codigo_postal_deposito">Codigo postal:</label>
      {{Form::text("codigo_postal", null, ["class"=>"form-control", "id"=>"codigo_postal_deposito", "placeholder"=>"Ingrese el codigo postal"])}}
  </div>
</div>


<div class="form-group">
    <div>
        <label class="control-label" for="ext_deposito">Numero Exterior:</label>
        {{Form::text("numero_exterior", null, ["class"=>"form-control", "id"=>"ext_deposito", "placeholder"=>"Ingrese el numero exterior"])}}
    </div>
</div>

<div class="form-group">
    <div>
        <label class="control-label" for="int_deposito">Numero Interio:</label>
        {{Form::text("numero_interior", null, ["class" => "form-control", "id" => "int_deposito", "placeholder" => "Ingrese el numero interio"])}}
    </div>
</div>

<div class="form-group">
    <div>
        <label class="control-label" for="calle_desposito">Calle:</label>
        {{Form::text("calle", null, ["class"=>"form-control", "id" => "calle_deposito", "placeholder" => "Ingrese la calle"])}}
    </div>
</div>