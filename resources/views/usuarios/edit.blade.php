@extends('layout.master')
@section("title","Registro")
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-primary">
    			<div class="panel-heading">Registro</div>
    				<div class="panel-body">
    					{{Form::model($user, ["route" => ["usuarios.destroy", $user->id], "class" => "form-horizontal", "method" => "DELETE", "role" => "form"])}}
	            			@include("usuarios.form")
	            			<div class="form-group">
    							<div class="col-md-6 col-md-offset-4">
        							{{Form::submit("Eliminar",["class"=>"btn btn-danger"])}}
        						</div>
        					</div>
	            		{{Form::close()}}
    				</div>
    		</div>
    	</div>
    </div>
@endsection