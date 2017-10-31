@extends("layout.master")
@section("title","Contribuyente")
@section("content")
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Contribuyente</h1>
        </div>
        <div class="panel panel-body">
            {!!Form::model($contribuyente, ["class" => "form-horizontal", "role" => "form"])!!}    
                @include("contribuyentes.add")
            {!!Form::close()!!}
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Domicilio</h1>
        </div>
        <div class="panel panel-body">
            @if($domicilios->isEmpty())
                {{"No existe ningun domicilio"}}
                <button type="button" class="btn btn-success">Agregar Domicilio</button>
            @else
                @foreach($domicilios as $domicilio)
                    {!!Form::model($domicilio, ["class" => "form-horizontal", "role" => "form"])!!}    
                        @include("domicilios.contribuyentes")
                    {!!Form::close()!!}
                @endforeach
            @endif
        </div>
    </div>
@endsection