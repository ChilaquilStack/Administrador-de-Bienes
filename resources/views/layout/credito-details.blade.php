<div class="panel panel-default">
    <div class="panel-body">
        <table class="table">
            <thead><tr><th>Crédifo Fiscal</th><th>Origen del Credito</th><th>Monto</th><th>Contribuyente</th><th>Numero de control</th></tr></thead>
            <tbody>
                @foreach($articulo->bien->creditos as $credito)
                <tr>
                    <td>{{$credito->folio}}</td>
                    <td>{{$credito->origen_credito}}</td>
                    <td>{{$credito->monto}}</td>
                    <td>{{$credito->contribuyente->Nombre." ".$credito->contribuyente->Apellido_Paterno." ".$credito->contribuyente->Apellido_Materno}}</td>
                    <td>{{$credito->pivot->bienes_numero_control}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>