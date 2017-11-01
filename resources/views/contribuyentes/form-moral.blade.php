<div class="form-group">
    {!!Form::label("razon_social","Razon Social:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("Nombre",null,["class"=>"form-control", "placeholder"=>"Ingrese la razon social del contribuyente", "id" => "razon_social"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("telefono","Telefono:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("Telefono",null,["class"=>"form-control", "placeholder"=>"Ingrese el telefono", "id" => "telefono_contribuyente"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("RFC","RFC:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("RFC",null,["class"=>"form-control", "placeholder"=>"Ingrese el RFC", "id" => "rfc_contribuyente"])!!}
    </div>
</div>