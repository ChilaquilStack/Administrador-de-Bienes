@extends("layout.master")
@section("title","Inicio")
@section("content")
@include("auth.login-modal")
@include("auth.register-modal")
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
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
                        @if(isset($bien->imagen))
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
                        @endif
                    </div>
                @endforeach
            @else
                {{"Aun no existen productos"}}
            @endif
       
        </div>

    </div>

</div>
@endsection
@section("scripts")
    <script type="text/javascript">
        var btn_login = $("#btn_login"), btn_register = $("#btn_register");
        btn_login.click(function(){
            $("#login-modal").modal();
        });
        btn_register.click(function(){
           $("#register-modal").modal(); 
        })
    </script>
@endsection