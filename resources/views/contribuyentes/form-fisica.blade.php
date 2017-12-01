<div class="form-group">
    {!!Form::label("Nombre","Nombre:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("Nombre",null,["class"=>"form-control", "placeholder"=>"Ingrese el nombre del contribuyente", "id" => "nombre_contribuyente"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("Apellido_Paterno","Apellido Paterno:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("Apellido_Paterno",null,["class"=>"form-control", "placeholder"=>"Ingrese el apellido paterno del contribuyente", "id" => "apellido_paterno_contribuyente"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("apellido","Apellido Materno:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("Apellido_Materno",null,["class"=>"form-control", "placeholder"=>"Ingrese el apellido materno", "id" => "apellido_materno_contribuyente"])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label("CURP","CURP:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
    {!!Form::text("CURP",null,["class"=>"form-control", "placeholder"=>"Ingrese el CURP", "id" => "curp_contribuyente"])!!}
    </div>
</div>
