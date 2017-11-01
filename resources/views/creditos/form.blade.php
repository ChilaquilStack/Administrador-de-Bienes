<input type="hidden" id="data" value="">
<div class="form-group">
	<label for="folio">Credito Fiscal:</label>
	<input class="form-control" id="folio" placeholder="numero de credito fiscal" type="text">
</div>
<div class="form-group">
	{!!Form::label("documento","Documento Determinante:")!!}
    {!!Form::text("documento",null,["class" => "form-control", "id" => "documento", "placeholder" => "documento determinante"])!!}
</div>
<div class="form-group">
	{!!Form::label("origen","Origen del credito:")!!}
	<select name="origen" id="origen">])!!}
	@foreach($origenes as $origen)
		<option value="{{$origen}}" selected>{{$origen}}</option>
	@endforeach
	</select>
</div>
<div class="form-group">
	{!!Form::label("monto","Monto:")!!}
	{!!Form::number("monto",0,["class" => "form-control","min" => 1, "id" => "monto", "placeholder" => "$"])!!}
</div>