<div class="col-sm-3">
    <p class="lead">Categorias</p>
    <div class="list-group">
    @foreach($categorias as $categoria)
        <a href="#" class="list-group-item">{{$categoria->nombre}}</a>
    @endforeach
    </div>
</div>