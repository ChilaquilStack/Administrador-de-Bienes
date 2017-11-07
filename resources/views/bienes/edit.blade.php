@extends("layout.master")
@section("title","editar")
@section("content")
    <div class="panel-group">
        
        @include("layout.credito-details")

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Editar</h1>
        </div>
            <div class="panel-body">
                {!!Form::model($articulo,[ "class"=>"form-horizontal", "role"=>"form" ])!!}
                    @include("articulos.form")
                    <button type="button" id="btn_editar_articulo" class="btn btn-success">Guardar</button>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection