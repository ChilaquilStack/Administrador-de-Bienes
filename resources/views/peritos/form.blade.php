<div class="form-group">
	{!! Form::label("nombre", "Nombre del Perito:") !!}
    {!! Form::text("nombre", null, ["class"=>"form-control", "id" => "nombre_perito", "placeholder" => "Nombre del perito"])!!}
</div>
<div class="form-group">
	{!!Form::label("apellido_paterno","Apellido Paterno del Perito:")!!}
    {!!Form::text("apellido_paterno",null,["class" => "form-control", "id" => "apellido_paterno_perito", "placeholder" => "Apellido Paterno"])!!}
</div>
    <div class="form-group">
	{!!Form::label("apellido_materno","Apelldo Materno del perito:")!!}
	{!!Form::text("apellido_materno",null,["class" => "form-control", "placeholder" => "Apellido Materno", "id" => "apellido_materno_perito"])!!}
</div>