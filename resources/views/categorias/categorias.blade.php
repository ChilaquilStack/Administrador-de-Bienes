<div class="list-group">
    @foreach($bien->categorias as $categoria)
        <div class="list-group-item">
            <h4 class="list-group-item-heading">{{$categoria->nombre}}</h4>
            <div class="list-group">
                @foreach($categoria->subcategorias as $subcategoria)
                    <h5 class="list-group-item-heading">{{$subcategoria->nombre}}</h5>
                    @foreach($subcategoria->subsubcategorias as $subsubcategoria)
                        <div class="list-group-item">
                            {{$subsubcategoria->nombre}}
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>    
    @endforeach
</div>