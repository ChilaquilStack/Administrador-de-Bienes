@extends("layout.master")
@section("content")
    {!!Form::open(["class" => "form-horizontal"])!!}
        @include("articulos.form")
    <button type="button" class="btn btn-success btn-sm">Guardar</button>
    {!!Form::close()!!}
@endsection