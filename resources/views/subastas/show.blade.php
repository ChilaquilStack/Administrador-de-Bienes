@extends("layout.master")
@section("title", "Subasta")
@section("content")
<div class="row">
    @include("subastas.navbar-categorias")
    <div class="col-lg-9">
        <div class="row carousel-holder">
            <div class="col-md-12">
                <img src="/banner/banner.jpg" alt="" style="height:150px ;width:800px">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($articulo->imagenes as $imagen)
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active {{$loop->first ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($articulo->imagenes as $imagen)
                            <div class="item {{$loop->first ? 'active' : ''}}">
                                <img class="slide-image" src="{{'/img/'.$imagen->nombre}}" alt="{{$imagen->descripcion}}" style="height:300px ;width:800px">
                            </div>
                        @endforeach
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
    
        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Descripcion
            </div>
            <div class="card-body">
                <p>{{$articulo->descripcion}}</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                {{--<a href="#" class="btn btn-success">Ofertar</a>--}}
            </div>
        </div>
          <!-- /.card -->
     
</div>
    
    
    
    </div>
        <!-- /.col-lg-9 -->
</div>
@endsection