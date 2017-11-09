<div class="form-group">
    {!!Form::label("Cantidad","Cantidad", ["class" => "control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {{Form::number("cantidad",null,["class" => "form-control", "min"=>"1", "id" => "cantidad"])}}
    </div>
</div>

<div class="form-group">
    {!!Form::label("descripcion","Descripcion Detallada", ["class" => "control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::textarea("descripcion", null,["class" => "form-control","cols"=>"30","rows"=>"5", "placeholder" => "descripcion detallada del bien", "id" => "descripcion_articulo"])!!}
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
{!! Form::label("subcategorias","Sub-Categorias", ["class"=>"control-label col-sm-2"])!!}
        <div class="col-sm-10">
            <select name="subcategoria" id="subcategoria">
            @foreach($subcategorias as $subcategoria)
                <option value="{{$subcategoria->id}}">{{$subcategoria->descripcion}}</option>
            @endforeach
            </select>
        </div>
</div>
<div class="form-group">
    {!! Form::label("subcategorias","Sub-subCategorias", ["class"=>"control-label col-sm-2"])!!}
    <div class="col-sm-10">
        <select name="subsubcategoria" id="subsubcategoria">
            <option value=""></option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="slide-image" src="img/car-2478640_640.jpg" alt="Imagen">
            <div class="caption">
                <h3>Imagen1</h3>
                <p>Descripcion</p>
                <p><input type="file" name="" id=""></p>
            </div>
        </div>
    </div>

  <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <img class="slide-image" src="img/car-2478640_640.jpg" alt="...">
          <div class="caption">
              <h3>Imagen2</h3>
              <p>Descripcion</p>
              <p><input type="file" name="" id=""></p>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="slide-image" src="img/car-2478640_640.jpg" alt="...">
            <div class="caption">
                <h3>Imagen3</h3>
                <p>Descripcion</p>
                <p><input type="file" name="" id=""></p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="slide-image" src="img/car-2478640_640.jpg" alt="...">
            <div class="caption">
                <h3>Imagen1</h3>
                <p>Descripcion</p>
                <p><input type="file" name="" id=""></p>
            </div>
        </div>
    </div>

</div>