@extends("layout.master")
@section("title","Inicio")
@section("content")
<div class="row">
    <div class="col-md-3">@include("subastas.navbar-categorias")</div>
    <div class="col-md-9">
        <div class="row">
            @if(isset($categoria))
                <div class="page-header"><h1>{{$categoria->nombre}}</h1></div>
            @endif
            @if(count($bienes) > 0) 
                @foreach($bienes as $bien)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{'/../admon/public/img/'.$bien->imagenes->first()->nombre}}" alt="{{$bien->imagenes->first()->nombre}}" class="img-responsive" style="height:150px ;width:320px">
                            <div class="caption">
                                <h4 class="pull-right">${{number_format($bien->valuaciones()->first()->pivot->monto)}}</h4>
                                <h4><a href="{{action('HomeController@show',['bien' => $bien->numero_control])}}">#{{$bien->numero_control}}</a></h4>
                                <p>{{$bien->descripcion}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{"No existen productos"}}
            @endif
       
        </div>

    </div>

</div>
@endsection