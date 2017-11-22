@extends("layout.master")
@section("title","Categorias")
@section("content")
    <div class="row">
        <div class="col-md-12 col-sm-8 col-xs-">
            {{Form::open(['class' => 'form-horizontal', 'role' => 'form'])}}
                @include("categorias.form")
                <div class="form-group">
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-success btn-sm" id="guardar_categoria">Guardar</button>
                    </div>
                </div>
            {{Form::close()}}
            <div class="panel">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">Categorias</h1>
                    </div>
                    <table class="table table-striped table-condensed" id="tabla_categorias">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/categorias.js")}}
@endsection