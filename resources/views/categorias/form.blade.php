<div class="form-group">
    {{Form::label("categoria", "Categoria", ["class" => "control-label col-sm-2"])}}
    <div class="col-sm-9">
        {{Form::text("categoria",null,["class" => "form-control", "placeholder" => "Categoria", "id" => "categoria"])}}
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-success btn-sm" id="btn_agregar_categoria"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>
</div>

<div class="form-group">
    {!!Form::label("subcategorias","Subcategorias", ["class" => "control-label col-sm-2"])!!}
    <div class="col-sm-9">
        {{Form::text("subcategoria",null,["class" => "form-control", "placeholder"=>"subcategoria", "id" => "subcategoria"])}}
    </div>
</div>

<div class="form-group">
    {!!Form::label("subsubcategorias","Sub-subcategorias", ["class" => "control-label col-sm-2"])!!}
    <div class="col-sm-9">
        {{Form::text("subsubcategorias",null,["class" => "form-control", "placeholder"=>"sub-subcategoria", "id" => "subsubcategoria"])}}
    </div>
</div>