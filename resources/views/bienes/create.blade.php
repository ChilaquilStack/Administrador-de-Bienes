@extends("layout.master")
@section("title","Bienes")
@section("content")
    <form class="form-horizontal" role="form">
        <h1>Registro de bienes</h1>
        <div class="form-group">
            <label class="control-label col-sm-2" for="credito_fiscal">Crédito Fiscal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="credito_fiscal">
            </div>
        </div>
        @include('bienes.form')
        <div class="form-group">
            <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
            <div class="col-sm-10">
                @include('articulos.tabla-articulos-temporales')
            </div>
        </div>
    </form>
    <form class="form-inline" role="form">
        @include('depositos.form')
        <div class="form-group">
            <div class="col-sm-10">
                <button id="guardar" type="button" class="btn btn-success btn-lg">Guardar Bien</button>
            </div>
        </div>
        {{-- <div class="form-group">
            <div class="col-sm-10">
            @include('bienes.tabla-articulos-temporales')
            </div>
        </div> --}}
    </form>
    @include('articulos.tabla-articulos')
@endsection
@section("scripts")
    {{Html::script("js/variables.js")}}
    {{Html::script("js/bienes.js")}}
@endsection