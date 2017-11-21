@extends("layout.master")
@section("title","Subastas")
@section("content")
<div class="row">
    @include("subastas.navbar-categorias")
    <div class="col-md-9">
        <div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="/img/kitchen-2174593_640.jpg" alt="" style="height:300px ;width:800px">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="/img/phone-2920775_640.jpg" alt=""  style="height:300px ;width:800px">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="/img/car-2927400_640.jpg" alt=""  style="height:300px ;width:800px">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>

    <div class="row">
    @foreach($remates as $remate)
        @foreach($remate->articulos as $articulo)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <a href="{{action('SubastaController@show', ['articulo' => $articulo->id])}}">
                        <img src="{{'/img/'.$articulo->imagenes->first()->nombre}}" alt="{{$articulo->imagenes->first()->nombre}}" class="img-responsive"  style="height:150px ;width:320px"></a>
                    <div class="caption">
                        <h4 class="pull-right">${{number_format($articulo->valuaciones()->first()->pivot->monto)}}</h4>
                        <h4><a href="#">Remate: {{$remate->id}}</a></h4>
                        <p>{{$articulo->descripcion}}.</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
    </div>
</div>
@endsection
