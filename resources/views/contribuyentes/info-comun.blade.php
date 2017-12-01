<div class="form-group">
    {!!Form::label("telefono","Telefono:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {{Form::text("telefono",null,["class"=>"telefono form-control", "placeholder"=>"Ingrese el telefono", "id" => "telefono_contribuyente"])}}
    </div>
</div>

<div class="form-group">
    {!!Form::label("RFC","RFC:",["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {{Form::text("rfc",null,["class"=>"rfc form-control", "placeholder"=>"Ingrese el RFC", "id" => "rfc"])}}
    </div>
</div>