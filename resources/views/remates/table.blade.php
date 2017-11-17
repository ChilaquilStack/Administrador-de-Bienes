<div class="form-group">
    <table class="table table-bordered table-hover">
        <thead>
            <th>#</th><th>Descripcion</th><th>Cantidad</th><th>Valuacion</th><th>Remate</th><th>Inicio</th><th>Fin</th><th>Baja</th>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
                <tr>
                    <td>{{$articulo->id}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->cantidad}}</td>
                    <td>${{number_format($articulo->valuaciones()->first()->pivot->monto, 2)}}</td>
                    @if($articulo->remates->isEmpty())
                        <td>{{Form::checkbox("articulos[]", $articulo->id)}}</td>
                    @else
                        <td>{{$articulo->remates->last()->id}}</td>
                        <td>{{$articulo->remates->last()->fecha_inicio}}</td>
                        <td>{{$articulo->remates->last()->fecha_fin}}</td>
                        <td><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>