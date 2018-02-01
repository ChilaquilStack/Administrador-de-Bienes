<div class="form-group">
    <label class="control-label col-sm-2" for="estado_deposito">Estado:</label>
    <div class="col-sm-10">
        <select id="estado_deposito" class="form-control">
            @foreach($estados as $estado)
                @if($estado->id == 14)
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="municipio_deposito">Municipio:</label>
    <div class="col-sm-10">
        <select id="municipio_deposito" class="form-control">
            @foreach($municipios as $municipio)
                <option value ="{{$municipio->id}}">{{$municipio->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="colonia_deposito">Colonia:</label>
    <div class="col-sm-10">
        {{Form::text("colonia", null, ["class" => "form-control", "id"=>"colonia_deposito", "placeholder"=>"Ingrese la colonia"])}}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="codigo_postal_deposito">Codigo postal:</label>
    <div class="col-sm-10">
        {{Form::text("codigo_postal", null, ["class"=>"form-control", "id"=>"codigo_postal_deposito", "placeholder"=>"Ingrese el codigo postal"])}}
    </div>
</div>


<div class="form-group">
    <label class="control-label col-sm-2" for="ext_deposito">Numero Exterior:</label>
    <div class="col-sm-10">
        {{Form::text("numero_exterior", null, ["class"=>"form-control", "id"=>"ext_deposito", "placeholder"=>"Ingrese el numero exterior"])}}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="int_deposito">Numero Interio:</label>
    <div class="col-sm-10">
        {{Form::text("numero_interior", null, ["class" => "form-control", "id" => "int_deposito", "placeholder" => "Ingrese el numero interio"])}}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="calle_desposito">Calle:</label>
    <div class="col-sm-10">
        {{Form::text("calle", null, ["class"=>"form-control", "id" => "calle_deposito", "placeholder" => "Ingrese la calle"])}}
    </div>
</div>