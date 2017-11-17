<div class="form-group">
    {{Form::label("fecha_inicio", "Fecha Inicio:", ["class" => "control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("fecha_inicio", null, ["class"=>"form-control", "id"=>"fecha_inicio_remate"])}}
    </div>
</div>

<div class="form-group">
    {{Form::label("hora_inicio", "Hora Inicio:", ["class" => "control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("hora_inicio", "0:00", ["class"=>"form-control", "id"=>"hora_inicio_remate"])}}
    </div>
</div>

<div class="form-group">
    {{Form::label("fecha_fin", "Fecha Fin:", ["class" => "control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("fecha_fin", null, ["class"=>"form-control", "id"=>"fecha_fin_remate"])}}
    </div>
</div>

<div class="form-group">
    {{Form::label("hora_fin:", "Hora Fin: ",["class" => "control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("hora_fin", "0:00", ["class"=>"form-control", "id"=>"hora_fin_remate"])}}
    </div>
</div>