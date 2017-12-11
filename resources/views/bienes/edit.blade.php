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
                {{Form::model($bien,["route" => ["bienes.update", $bien->id], "method" => "PUT", "class"=>"form-horizontal", "role"=>"form"])}}
                    @include("articulos.form")
                    <button type="submit" class="btn btn-success">Guardar</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    {{Html::script("js/sub_subsub_categorias.js")}}
@endsection