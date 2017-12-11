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
            <div class="panel-group" id="categorias">
                <div class="panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">Agregar</div>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['class' => 'form-horizontal', 'role' => 'form'])}}
                            @include("categorias.form")
                        {{Form::close()}}
                    </div>
                </div>
                    @foreach($categorias as $categoria)
                    <div class="panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a data-toggle="collapse" data-parent="#categorias" href="{{'#collapse'.$categoria->id}}">{{$categoria->nombre}}</a>
                                <div class="btn-group pull-right control-group">
                                    <button class="btn btn-success btn-sm" title="Agregar subcategorias" onclick="{{'crear_subcategoria('.$categoria->id.')'}}">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <a href="{{action('CategoriasController@destroy', ['categoria' => $categoria->id])}}" title="eliminar categoria"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                </div>
                            </div>
                        </div>
                        <div id="{{'collapse'.$categoria->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="list-group">
                                    @foreach($categoria->subcategorias as $subcategoria)
                                        <li class="list-group-item">
                                            <div class="list-group-item-heading">
                                                <div class="btn-group pull-right control-group">
                                                    <button class="btn btn-success btn-sm" title="Agregar subsubcategorias" onclick="{{'crear_subsubcategoria('.$subcategoria->id.')'}}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                    </a>
                                                    <a href="{{action('CategoriasController@subcategoria_destroy', ['subcategoria' => $subcategoria->id])}}" title="eliminar subcategoria">
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <p class="list-group-item-text">{{$subcategoria->nombre}}</p>
                                            <ul>
                                                @foreach($subcategoria->subsubcategorias as $subsubcategoria)
                                                    <li>
                                                        <p class="list-group-item-text">
                                                            {{$subsubcategoria->nombre}}
                                                            <a href="{{action('CategoriasController@subsubcategoria_destroy', ['subsubcategoria' => $subsubcategoria->id])}}" title="eliminar subcategoria">
                                                                <button class="btn btn-link btn-sm">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/funciones.js")}}
    {{Html::script("js/categorias.js")}}
@endsection