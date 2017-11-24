<div class="form-group">
    {{Form::label("documento_embargo", "Documento de Embargo", ["class" => "control-label col-sm-2control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::text("documento_embargo",null,["class" => "form-control", "placeholder" => "Documento de embargo", "id" => "documento_embargo"])}}
    </div>
</div>

<div class="form-group">
    {!!Form::label("Cantidad","Cantidad", ["class" => "control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {{Form::number("cantidad",null,["class" => "form-control", "min"=>"1", "id" => "cantidad"])}}
    </div>
</div>

<div class="form-group">
    {{Form::label("descripcion","Descripcion Detallada", ["class" => "control-label col-sm-2"])}}
    <div class="col-sm-10">
        {{Form::textarea("descripcion", null,["class" => "form-control","cols"=>"30","rows"=>"5", "placeholder" => "descripcion detallada del bien", "id" => "descripcion_articulo"])}}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="categoria">Categoría:</label>
    <div class="col-sm-9">
        <select name="categoria" id="categoria">
            @isset($articulo)
                @if($articulo->categorias->count() > 0)
                    <option value="{{$articulo->categorias->first()->id}}" selected>{{$articulo->categorias->first()->descripcion}}</option>
                @endif
            @endisset
                <option value="">Seleccione una categoria</option>
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-success btn-sm" id="agregar_categoria"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>
</div>

<div class="form-group">
    {{Form::label("subcategorias","Sub-Categorias", ["class"=>"control-label col-sm-2"])}}
    <div class="col-sm-9">
        <select name="subcategoria" id="subcategoria">
        @isset($articulo)
            @if($articulo->subcategorias->count() > 0)
                <option value="{{$articulo->subcategorias->first()->id}}" selected>{{$articulo->subcategorias->first()->nombre}}</option>
            @endif
        @endisset
            <option value="" selected>Selectione una subcategoria</option>
        @foreach($subcategorias as $subcategoria)
            <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
        @endforeach
        </select>
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-success btn-sm" id="agregar_subcategoria"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>
</div>

<div class="form-group">
    {{Form::label("subcategorias","Sub-subCategorias", ["class"=>"control-label col-sm-2"])}}
    <div class="col-sm-9">
        <select name="subsubcategoria" id="subsubcategoria">
            <option value="">Seleccione unsa subsubcategoria</option>
        </select>
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-success btn-sm" id="agregar_subsubcategoria"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>
</div>