<div class="nav-side-menu">
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse in">
            @foreach($categorias as $categoria)
                <li data-toggle="collapse" data-target="#categoria_{{$categoria->id}}" class="collapsed">
                    <a href="#">{{$categoria->nombre}}</a>
                </li>
                <ul class="sub-menu collapse" id="categoria_{{$categoria->id}}">
                    <li>
                    <a href="{{action('HomeController@categorias', ['categoria' => $categoria->id])}}">Mostrar todo</a></li>
                        @foreach($categoria->subcategorias as $subcategoria)
                        <li data-toggle="collapse" data-target="#subcategoria_{{$subcategoria->id}}" class="collapsed">
                            <a href="">{{$subcategoria->nombre}}</a>
                        </li>
                        <ul class="sub-menu collapse" id="subcategoria_{{$subcategoria->id}}">
                            @foreach($subcategoria->subsubcategorias as $subsubcategoria)
                                <li><a href="#">{{$subsubcategoria->nombre}}</a></li>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
</div>