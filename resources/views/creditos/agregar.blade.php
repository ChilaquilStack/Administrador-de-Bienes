<div class="modal fade" tabindex="-1" role="dialog" id="agregar_credito">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Credito Fiscal</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class"=>"form-horizontal", "rol"=>"form", "id" => "formulario_credito"])}}
                    @include("creditos.form")
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#moral" aria-controls="uploadTab" role="tab" data-toggle="tab">Moral</a>
                            </li>
                            <li role="presentation">
                                <a href="#fisica" aria-controls="browseTab" role="tab" data-toggle="tab">Fisica</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="moral">
                                @include('contribuyentes.form-moral')
                                @include('contribuyentes.info-comun')
                            </div>
                            <div role="tabpanel" class="tab-pane" id="fisica">
                                @include('contribuyentes.form-fisica')
                                @include('contribuyentes.info-comun')
                            </div>
                        </div>  
                    </div>
                    @include('domicilios.contribuyentes')
                    @include('domicilios.contribuyentes')
                {{ Form ::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="agregar_credito()">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->