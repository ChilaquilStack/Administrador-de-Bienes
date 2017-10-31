@extends("layout.master")
@section("title","editar")
@section("content")
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Editar</h1>
        </div>    
        <div class="panel-body">
            {!!Form::model($articulo,[ "class"=>"form-horizontal", "role"=>"form" ])!!}
                @include("articulos.form")
            {!!Form::close()!!}
        </div>
    </div>
@endsection