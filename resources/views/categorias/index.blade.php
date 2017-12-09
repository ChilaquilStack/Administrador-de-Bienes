@extends("layout.master")
@section("title","Categorias")
@section("content")
@include('layout.modals.warning')
@include('layout.modals.success')
    <div class="row">
        <div class="col-md-12 col-sm-8 col-xs-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {{Form::open(['class' => 'form-horizontal', 'role' => 'form'])}}
                @include("categorias.form")
            {{Form::close()}}
            <table class="table table-striped table-condensed" id="tabla_categorias">
                <thead>
                    <tr><th>Categoria</th><th>Subcategoria</th><th>Subsubcategoria</th></tr>
                </thead>
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
                                                <h4 class="list-group-item-heading">
                                                    {{$categoria->nombre}}
                                                    <div class="btn-group pull-right">
                                                        <a href="#">
                                                            <button class="btn btn-success btn-sm">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{action('CategoriasController@destroy', ['categoria' => $categoria->id])}}">
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </h4>
                                                <div class="list-group">
                                                    @if($categoria->subcategorias->isNotEmpty())
                                                        @foreach($categoria->subcategorias as $subcategoria)
                                                            <h5 class="list-group-item-heading">{{$subcategoria->nombre}}</h5>
                                                            <div class="list-group">
                                                                @if($subcategoria->subsubcategorias->isNotEmpty())
                                                                    @foreach($subcategoria->subsubcategorias as $subsubcategoria)
                                                                        <h6 class="list-group-item-heading">{{$subsubcategoria->nombre}}</h6>
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
                                {{"No existen categorias"}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/categorias.js")}}
@endsection