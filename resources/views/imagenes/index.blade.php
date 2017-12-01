@extends("layout.master")
@section("title","Imagenes")
@section("css")
    {{Html::style("css/dropzone.css")}}
@endsection
@section("content")
    @include("layout.credito-details")
    {{Form::model($articulo, ["class" => "form-horizontal", "role" => "form" ])}}
        @include("articulos.form")
        @if($articulo->imagenes->isNotEmpty())
            <div class="row">
                @foreach($articulo->imagenes as $imagen)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src = "{{'/img/'.$imagen->nombre}}" class="img-responsive" alt="{{$imagen->nombre}}">
                            <div class="caption">
                                <p>{{$imagen->nombre}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    {{Form::close()}}
    @if($articulo->imagenes->count() < 4 )
        {{Form::open(["class" => "dropzone"])}}
            @include("imagenes.form")
        {{Form::close()}}
    @endif
@endsection
@section("scripts")
    {{Html::script("js/dropzone.js")}}
    {{Html::script("js/imagenes.js")}}
@endsection