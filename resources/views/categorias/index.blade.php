@extends("layout.master")
@section("title","Categorias")
@section("content")
    <div class="row">
        <div class="col-md-12 col-sm-8 col-xs-4">
            {{Form::open(['class' => 'form-horizontal', 'role' => 'form'])}}
                @include("categorias.form")
                <div class="form-group">
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-success btn-sm" id="guardar_categoria">Guardar</button>
                    </div>
                </div>
            {{Form::close()}}
            <table class="table table-striped table-condensed" id="tabla_categorias">
                <thead></thead>
                <tbody></tbody>
            </table>
            <div class="panel">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">Categorias</h1>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @if($categorias->isNotEmpty())
                                @foreach($categorias as $categoria)
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <div class="list-group-item">
                                                <h4 class="list-group-item-heading">{{$categoria->nombre}}</h4>
                                                <div class="list-group">
                                                @if($categoria->subcategorias->isNotEmpty())
                                                        @foreach($categoria->subcategorias as $subcategoria)
                                                            <h5 class="list-group-item-heading">{{$subcategoria->nombre}}</h5>
                                                            <div class="list-group">
                                                                @if($subcategoria->subsubcategorias->isNotEmpty())
                                                                    @foreach($subcategoria->subsubcategorias as $subsubcategoria)
                                                                        <h6 class="list-group-item-heading">{{$subsubcategoria->nombre}}</h5>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{"No existe categorias"}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/categorias.js")}}
@endsection