<div class="modal fade" tabindex="-1" role="dialog" id="agregar_bien">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Bien</h4>
      </div>
      <div class="modal-body">
        {{Form::open(["class"=>"form-horizontal", "rol"=>"form"])}}
          @include("depositos.form")
          <hr>
          @include("domicilios.deposito")
          <hr>
          @include("articulos.form")
          <hr>
          @include('articulos.tabla-articulos-temporales')
        {{Form ::close()}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->