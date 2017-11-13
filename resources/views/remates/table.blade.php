<div class="form-group">
    <table class="table table-bordered table-hover">
        <thead>
            <th>#</th><th>Descripcion</th><th>Cantidad</th><th>Valuacion</th><th>Remate</th>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
                <tr>
                    <td>{{$articulo->id}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->cantidad}}</td>
                    <td>${{number_format($articulo->valuaciones()->first()->pivot->monto, 2)}}</td>
                    <td>{{Form::checkbox("articulos[]", $articulo->id)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>