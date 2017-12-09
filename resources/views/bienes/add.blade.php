<div class="row">
    <div class="col-md-12">
        <div class="panel-group">
            <div class="panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Artículo</h3>
                </div>
                <div class="panel-body">
                    {{Form::open(["class" => "form-horizontal", "id"=>"formulario_bienes"])}}
                        @include("articulos.form")
                    {{Form::close()}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="bienes"><button type="button" id="agregar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        </div>
                        @include('articulos.tabla-articulos-temporales')
                    </div>
                </div>
                <div class="panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Deposito
                        </h1>
                    </div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-inline", "id"=>"formulario_deposito"])}}
                            @include("domicilios.deposito")
                        {{Form::close()}}
                    </div>
                </div>
                <div class="panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Depositario
                        </h1>
                    </div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-inline", "id"=>"formulario_depositario"])}}
                            @include("depositos.form");
                        {{Form::close()}}
                    </div>
                </div>
                <button type="button" id="guardar" class="btn btn-success brtn-sm">Guardar</button>
        </div>
    </div>
</div>