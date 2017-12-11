@extends("layout.master")
@section("title","Imagenes")
@section("css")
{{Html::style("css/dropzone.css")}}
@endsection
@section("content")
@include("layout.credito-details")
<div class="row">
	<div class="panel-group">
		<div class="panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Bien</div>
			</div>
			<div class="panel-body">
				{{Form::model($bien, ["class" => "form-horizontal", "role" => "form" ])}}
					@include("articulos.form")
				{{Form::close()}}
			</div>
		</div>
		@if($bien->imagenes->isNotEmpty())
			<div class="panel-primary">
				<div class="panel-heading">
					<div class="panel-title">Imagenes</div>
				</div>
				<div class="panel-body">
					@foreach($bien->imagenes as $imagen)
						<div class="col-md-3 col-sm-6">
							<div class="thumbnail">
								<img src = "{{'/../Administrador-de-bienes/public/img/'.$imagen->nombre}}" class="img-responsive" alt="{{$imagen->nombre}}">
								<div class="caption">
									<p class="pull-right">
										<a href = "{{action('BienesController@imagen_destroy', ['imagen' => $imagen])}}" class = "btn btn-danger" role = "button">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
										</a>
         							</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>
	@if($bien->imagenes->count() < 4 )
		<div class="panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Agregar Imagenes</div>
			</div>
			<div class="panel-body">
				{{Form::open(["class" => "dropzone"])}}
					@include("imagenes.form")
				{{Form::close()}}
			</div>
		</div>
	@endif
</div>
@endsection
@section("scripts")
    {{Html::script("js/dropzone.js")}}
    {{Html::script("js/imagenes.js")}}
@endsection