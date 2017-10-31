@extends("layout.master")
@section("title","Agregar Credito Fiscal")
@section("content")
<div id="credito" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Registro Crédito Fiscal</h1>    
    </div>
    <div class="panel-body">
        {!!Form::open(["class"=>"form-inline", "rol"=>"form"])!!}
        <input type="hidden" id="data" value="">
        <div class="form-group">
            <label for="folio">Credito Fiscal:</label>
            <input class="form-control" id="folio" placeholder="numero de credito fiscal" type="text">
        </div>
        <div class="form-group">
            <label for="documento">Documento Determinante:</label>
            <input class="form-control" id="documento" placeholder="documento determinante" type="text">
        </div>
        <div class="form-group">
            <label for="origen">Origen del Credito:</label>
            <select name="origen" id="origen">
            @foreach($origenes as $origen)
                <option value="{{$origen}}" selected>{{$origen}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto">Monto:</label>
            <input class="form-control" id="monto" type="number" placeholder="$">
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div id="contribuyente" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Registro del Contribuyente</h1>
    </div>
    <div class="panel-body">
        {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
            @include('contribuyentes.add')
        {!! Form ::close() !!}
    </div>
</div>
<div id="bienes" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Registro de bienes</h1>
    </div>
    <div class="panel-body">
        {!! Form::open([ "class"=>"form-horizontal", "role"=>"form" ]) !!}
            @include('bienes.form')
            <div class="form-group">
                <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
            <div class="panel-defaut">
                <div class="panel-heading">
                    <h1 class="panel-title">Bienes</h1>
                </div>
                @include('bienes.tabla-articulos-temporales')
            </div>
        </div>
        {!! Form ::close()!!}
    </div>
</div>
<div id="deposito" class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Depositario</h1>
    </div>
    <div class="panel-body">
        {!!Form::open([ "class"=>"form-inline", "role"=>"form" ]) !!}
            @include('depositos.form')
        {!!Form::close()!!}
    </div>
</div>
@endsection