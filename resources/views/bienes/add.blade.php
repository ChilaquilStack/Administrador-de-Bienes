<div class="row">
    <div class="col-md-12">
        <div class="panel-group">
        	<div class="panel-primary">
                <div class="panel-heading"><div class="panel-title">Depositario</div></div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-inline", "id"=>"formulario_depositario"])}}
                            @include("depositos.form");
                        {{Form::close()}}
                    </div>
            </div>
            <div class="panel-primary">
                <div class="panel-heading"><div class="panel-title">Deposito</div></div>
                    <div class="panel-body">
                        {{Form::open(["class" => "form-inline", "id"=>"formulario_deposito"])}}
                            @include("domicilios.deposito")
                        {{Form::close()}}
                    </div>
            </div>
            <div class="panel-primary">
                <div class="panel-heading"><div class="panel-title">Artículos</div></div>
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
            <input type="hidden" name="credito" id="credito_hidden">
            <button type="button" id="btn_guardar_bien" class="btn btn-success brtn-sm">Guardar</button>
        </div>
    </div>
</div>