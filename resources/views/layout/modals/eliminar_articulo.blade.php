<div class="modal fade" id="eliminar_articulo">
    <input type="hidden" id="data_articulo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"  id="mensaje">
                <p>Commentarios</p>
                    <textarea id="comentarios_articulo" cols="70" rows="5"></textarea>
                <p>Categoria de la baja</p>
                <select id="categoria_bajas">
                    @foreach($bajas_articulos as $baja)
                        <option value="{{ $baja->id }}">{{$baja->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="aceptar_eliminar_articulo">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->