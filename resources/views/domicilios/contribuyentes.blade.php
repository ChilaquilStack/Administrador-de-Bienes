<div class="form-group">
    <label class="control-label col-sm-2" for="nombre">Estado:</label>
    <div class="col-sm-10">
        <select id="estado" class="estado">
            @foreach($estados as $estado)
                @if($estado->id == 14)
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    {{Form::label("municipio","Municipio", ["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            <select id="municipio" class="municipio">
               <option value="">Seleccione un municipio</option>
                @foreach($municipios as $municipio)
                    <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                @endforeach
            </select>
        </div>
</div>

<div class="form-group">
    {{Form::label("colonia","Colonia", ["class" => "control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("colonia", null, ["class"=>"colonia form-control", "placeholder" => "Ingrese la colonia", "id" => "colonia"])}}
    </div>
</div>

<div class="form-group">
    {{Form::label("cp","Codigo Postal:", ["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::text("cp", null, ["class"=>"codigo_postal form-control", "placeholder" => "Ingrese el codigo postal", "id"=>"codigo_postal"])}}
        </div>
</div>

<div class="form-group">
    {{Form::label("ext","Numero exterior:", ["class"=>"control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("ext", null, ["class"=>"ext contribuyente form-control", "placeholder" => "Ingrese el numero exterior", "id"=>"ext"])}}
    </div>
</div>

<div class="form-group">
    {{Form::label("int","Numero Interior:", ["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::text("int", null, ["class"=>"int form-control", "placeholder" => "Ingrese el numero interior", "id" => "int"])}}
        </div>
</div>


<div class="form-group">
    {!!Form::label("calle","Calle:", ["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("calle", null, ["class"=>"calle form-control", "placeholder" => "Ingrese la calle", "id"=>"calle"]) !!}
    </div>
</div>