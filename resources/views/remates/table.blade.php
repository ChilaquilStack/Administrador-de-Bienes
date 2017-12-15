<div class="form-group">
    <table class="table table-bordered table-hover">
        <thead>
            <th>#</th><th>Descripcion</th><th>Cantidad</th><th>Valuacion</th><th>Remate</th><th>Inicio</th><th>Fin</th><th>Baja</th>
        </thead>
        <tbody>
            @foreach($bienes as $bien)
                <tr>
                    <td>{{$bien->numero_control}}</td>
                    <td>{{$bien->descripcion}}</td>
                    <td>{{$bien->cantidad}}</td>
                    <td>${{number_format($bien->valuaciones()->first()->pivot->monto, 2)}}</td>
                    @if($bien->remates->isEmpty())
                        <td>{{Form::checkbox("bienes[]", $bien->numero_control)}}</td>
                    @else
                        <td>{{$bien->remates->last()->id}}</td>
                        <td>{{$bien->remates->last()->fecha_inicio}}</td>
                        <td>{{$bien->remates->last()->fecha_fin}}</td>
                        <td><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>