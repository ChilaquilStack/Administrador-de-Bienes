<div class="form-group">
	{{Form::label('folio','Credito Fiscal', ["class" => "control-label col-sm-2"])}}
	<div class="col-sm-10">
		<input class="form-control" placeholder="numero de credito fiscal" type="text" v-model="credito.folio">
	</div>
</div>
<div class="form-group">
	{{Form::label("documento","Documento Determinante:", ["class" => "control-label col-sm-2"])}}
	<div class="col-sm-10">
    	{{Form::text("documento",null,["class" => "form-control", "v-model" => "credito.documento_determinante", "placeholder" => "documento determinante"])}}
	</div>
</div>
<div class="form-group">
	{{Form::label("monto","Monto:", ["class" => "control-label col-sm-2"])}}
	<div class="col-sm-10">
		{{Form::number("monto",0,["class" => "form-control","min" => 1, "placeholder" => "$", "v-model" => "credito.monto"])}}
	</div>
</div>
<div class="form-group">
	{{Form::label("origen","Origen del credito:", ["class" => "control-label col-sm-2"])}}
	<div class="col-sm-10">
		<select class="form-control" v-model="credito.origen_credito">
			@foreach($origenes as $origen)
				<option value="{{$origen}}" selected>{{$origen}}</option>
			@endforeach
		</select>
	</div>
</div>