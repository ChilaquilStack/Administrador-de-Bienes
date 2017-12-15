<div class="modal fade" id="eliminar_credito" role="dialog">
    <input type="hidden" id="data_credito">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                {{Form::open(["role" => "form"])}}
                    <div class="form-group">
                        {{Form::label("comentarios", "Comentarios", ["class" => "control-label"])}}
                        {{Form::textarea("comentarios", "",["class" => "form-control", "cols" => "70", "rows" => "5", "style" => "resize: none"])}}
                    </div>
                    <div class="form-group">
                        {{Form::label("categorias_baja", "Motivo de la baja del credito fiscal", ["class" => "control-label"])}}
                        <select id="categorias_bajas_credito" name="categorias_baja"></select>
                    </div>
                    <div  class="form-group">
                        <select name="" id="subcategorias_bajas_credito" style="display:none;"></select>
                    </div>
                    <div  class="form-group">
                        <select name="" id="subsubcategorias_bajas_credito" style="display:none;"></select>
                    </div>
                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="aceptar_eliminar_credito">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->