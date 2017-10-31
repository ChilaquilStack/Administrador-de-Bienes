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
    {!!Form::label("Municipio","Municipio", ["class"=>"control-label col-sm-2"])!!}
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
        {!! Form::text("colonia", null, ["class"=>"form-control", "placeholder" => "Ingrese la colonia"]) !!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("cp","Codigo Postal:", ["class"=>"control-label col-sm-2"])!!}
        <div class="col-sm-10">
            {!! Form::text("cp", null, ["class"=>"form-control", "placeholder" => "Ingrese la colonia", "id"=>"codigo_postal"]) !!}
        </div>
</div>
<div class="form-group">
    {!!Form::label("int","Numero Interior:", ["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("int", null, ["class"=>"form-control", "placeholder" => "Ingrese el numero interior", "id"=>"int"]) !!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("ext","Numero exterior:", ["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("ext", null, ["class"=>"form-control", "placeholder" => "Ingrese el numero exterior", "id"=>"ext"]) !!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("calle","Calle:", ["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("calle", null, ["class"=>"form-control", "placeholder" => "Ingrese la calle", "id"=>"calle"]) !!}
    </div>
</div>