<form class="form-horizontal" role="form">
        <h1>Registro de bienes</h1>
<div class="form-group">
    <label class="control-label col-sm-2" for="numero_control">Numero de Control:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="numero_control">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="cantidad">Cantidad:</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" min="1" id="cantidad">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="comentarios">Comentarios:</label>
    <div class="col-sm-10">
        <textarea id="comentarios_bien" cols="30" rows="5" class="form-control"></textarea>
    </div>
</div>
<div class="form-group">
        <label class="control-label col-sm-2" for="categoria">Categoria:</label>
        <div class="col-sm-10">
            <select name="categoria" id="categoria">
                <option value="automoviles">Automoviles</option>
            </select>
        </div>
</div>
<div class="form-group">
        <label class="control-label col-sm-2" for="subcategoria">Sub-Categoria:</label>
        <div class="col-sm-10">
            <select name="subcategoria" id="subcategoria">
                <option value="motos">Motos</option>
            </select>
        </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="subsubcategoria">Sub-Sub-Categoria:</label>
    <div class="col-sm-10">
        <select name="subsubcategoria" id="subsubcategoria">
            <option value="pista">Pista</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="subsubcategoria">Sub-Sub-Categoria:</label>
    <div class="col-sm-10">
        @include('bienes.tabla')
    </div>
</div>
<button type="button" id="agregar" class="btn btn-success">Agregar</button>
</form>