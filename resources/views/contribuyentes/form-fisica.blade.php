<div class="form-group">
    {!!Form::label("nombre","Nombre:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("nombre",null,["class"=>"form-control", "placeholder"=>"Ingrese el nombre del contribuyente", "id" => "nombre_contribuyente"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("apellido_paterno","Apellido Paterno:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!! Form::text("apellido_paterno",null,["class"=>"form-control", "placeholder"=>"Ingrese el apellido paterno del contribuyente", "id" => "apellido_paterno_contribuyente"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("apellido_materno","Apellido Materno:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("apellido_materno",null,["class"=>"form-control", "placeholder"=>"Ingrese el apellido materno", "id" => "apellido_materno_contribuyente"])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label("id","CURP:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
    {!!Form::text("id",null,["class"=>"form-control", "placeholder"=>"Ingrese el CURP", "id" => "curp_contribuyente"])!!}
    </div>
</div>
