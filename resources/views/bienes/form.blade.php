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
    <label class="control-label col-sm-2" for="descripcion_articulo">Descripcion detallada:</label>
    <div class="col-sm-10">
        <textarea id="descripcion_articulo" cols="30" rows="5" class="form-control"></textarea>
    </div>
</div>

<div class="form-group">
        <label class="control-label col-sm-2" for="categoria">Categoria:</label>
        <div class="col-sm-10">
            <select name="categoria" id="categoria">
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
            @endforeach
            </select>
        </div>
</div>

<div class="form-group">
        <label class="control-label col-sm-2" for="subcategoria">Sub-Categoria:</label>
        <div class="col-sm-10">
            <select name="subcategoria" id="subcategoria">
            @foreach($subcategorias as $subcategoria)
                <option value="{{$subcategoria->id}}">{{$subcategoria->descripcion}}</option>
            @endforeach
            </select>
        </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="subsubcategoria">Sub-Sub-Categoria:</label>
    <div class="col-sm-10">
        <select name="subsubcategoria" id="subsubcategoria">
            <option value=""></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="imagen">Imagenes:</label>
    <div class="col-sm-10">
        <input type="file" id="imagen">
    </div>
</div>