@extends("layout.master")
@section("title","Categorias")
@section("content")
{{Form::open(['class' => 'form-horizontal', 'role' => 'form'])}}
    @include("categorias.form")
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
    </div>
    <div class="panel">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Categorias</h1>
            </div>
            <table class="table table-striped table-condensed" id="tabla_categorias">
            <caption>Categorias</caption>
                <thead></thead>
                <tbody>
                    <tr>
                        <td rowspan="8">Categoria</td>
                    </tr>
                    <tr>
                        <td rowspan="4">Subcategoria-1</td>
                    </tr>
                    <tr>
                        <td>subsubcategoria-1</td>
                    </tr>
                    <tr>
                        <td>subsubcategoria-2</td>
                    </tr>
                    <tr>
                        <td>subsubcategoria-3</td>
                    </tr>
                    <tr>
                        <td rowspan="3">Subcategoria-2</td>
                    </tr>
                    <tr>
                        <td>subsubcategoria-4</td>
                    </tr>
                    <tr>
                        <td>subsubcategoria-5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("scripts")
    {{Html::script("js/categorias.js")}}
@endsection