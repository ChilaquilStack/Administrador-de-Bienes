@extends("layout.master")
@section("title", "Subasta")
@section("content")
<div class="row">
    @include("subastas.navbar-categorias")

    <div class="col-lg-9">
        <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    
                    @foreach($articulo->imagenes as $imagen)
                    <div class="item">
                            <img class="slide-image" src="{{'/img/'.$imagen->nombre}}" alt="" style="height:300px ;width:800px">
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
                <a href="#" class="btn btn-success">Ofertar</a>
            </div>
        </div>
          <!-- /.card -->

    </div>
        <!-- /.col-lg-9 -->
</div>
@endsection