<div class="form-group">
    {!!Form::label("numero_control", "Numero de control", ["class" => "control-label col-sm-2control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("bienes_numero_control",null,["class" => "form-control", "placeholder" => "numero de control", "id" => "numero_control"])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label("documento_embargo", "Documento de Embargo", ["class" => "control-label col-sm-2control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("documento_embargo",null,["class" => "form-control", "placeholder" => "Documento de embargo", "id" => "documento_embargo"])!!}
    </div>
</div>
@include("articulos.form")