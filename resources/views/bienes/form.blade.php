<div class="form-group">
    {!!Form::label("numero_control", "Numero de control", ["class" => "control-label col-sm-2control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("bienes_numero_control",null,["class" => "form-control", "placeholder" => "numero de control"])!!}
    </div>
</div>
@include("articulos.form")