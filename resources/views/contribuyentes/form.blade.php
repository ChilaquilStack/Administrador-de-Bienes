<form class="form-horizontal" role="form">
  <h1>Registro del Contribuyente</h1>
  <div class="form-group">      
      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
      <div class="col-sm-10">
        <input class="form-control" id="nombre" placeholder="Ingrese el nombre del contribuyente" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="paterno">Apellido paterno:</label>
      <div class="col-sm-10">
        <input class="form-control" id="paterno" placeholder="Ingrese el apellido paterno" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="origen">Apellido materno:</label>
      <div class="col-sm-10">
        <input class="form-control" id="materno" placeholder="Ingrese el apellido materno" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="telefono">Telefono:</label>
      <div class="col-sm-10">
        <input class="form-control" id="telefono" type="text" placeholder="Ingrese el telefono">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="monto">RFC:</label>
      <div class="col-sm-10">
        <input class="form-control" id="rfc" type="text" placeholder="Ingrese el RFC">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="monto">CURP:</label>
      <div class="col-sm-10">
        <input class="form-control" id="curp" type="text" placeholder="Ingrede el CURP en caso de ser una persona moral">
      </div>
    </div>
    @include("domicilios.contribuyentes")
</form>