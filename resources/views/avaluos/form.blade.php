<div class="form-group">
	{!! Form::label("monto", "Monto:") !!}
    {!! Form::number("monto", null, ["class"=>"form-control", "id" => "monto"])!!}
</div>
<div class="form-group">
	{!!Form::label("numero_dictamen","Numero de Dictamen:")!!}
    {!!Form::text("numero_dictamen",null,["class" => "form-control", "id" => "numero_dictamen", "placeholder" => "Numero de Dictamen"])!!}
</div>
    <div class="form-group">
	{!!Form::label("fecha","fecha:")!!}
	{!!Form::date("fecha",null,["class" => "form-control", "fecha" => "fecha", "placeholder" => "DD/MM/AAAA", "id" => "fecha_avaluo"])!!}
</div>