<div class="form-group">
    {!!Form::label("numero_control", "Numero control", ["class" => "control-label col-sm-2control-label col-sm-2"])!!}
    <div class="col-sm-10">
        {!!Form::text("numero_control",null,["class" => "form-control", "placeholder" => "numero de control", "id" => "numero_control"])!!}
    </div>
</div>

<div class="form-group">
    {{Form::label("documento_embargo", "Documento Embargo", ["class" => "control-label col-sm-2control-label col-sm-2"])}}
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

@if(!empty($bien))
    <div class="form-group">
        {{Form::label("categorias","Categorias", ["class" => "control-label col-sm-2"])}}
        <div class="col-sm-10">
            @include("categorias.categorias")
        </div>
    </div>
@else
    <div class="form-group">
        <label class="control-label col-sm-4" for="categoria">Categoría:</label>
        <div class="col-sm-7">
            <select name="categoria" id="categoria" class="form-control">
                <option value="" selected>Seleccione una categoria</option>
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
        {{Form::label("subcategorias","Sub-Categorias", ["class"=>"control-label col-sm-4"])}}
            <div class="col-sm-7">
                <select name="subcategoria" id="subcategoria" class="form-control">
                    <option value="" selected>Selectione una subcategoria</option>
                </select>
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-success btn-sm" id="agregar_subcategoria"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
        </div>

        <div class="form-group">
            {{Form::label("subsubcategorias","Sub-subCategorias", ["class"=>"control-label col-sm-4"])}}
            <div class="col-sm-7">
                <select name="subsubcategoria" id="subsubcategoria" class="form-control">
                    <option value="">Seleccione una subsubcategoria</option>
                </select>
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-success btn-sm" id="agregar_subsubcategoria"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
    </div>
@endif