<div class="modal fade" id="eliminar_credito">
    <input type="hidden" id="data_credito">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"  id="mensaje">
                <p>Commentarios</p>
                    <textarea id="comentarios" cols="70" rows="5"></textarea>
                <p>Categoria de la baja</p>
                <select id="categoria_bajas">
                    @foreach($bajas_creditos as $baja)
                        <option value="{{ $baja->id }}">{{$baja->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="aceptar_eliminar_credito">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->