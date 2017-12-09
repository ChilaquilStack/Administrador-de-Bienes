<div class="panel panel-default">
    <div class="panel-body">
        <table class="table">
            <thead><tr><th>Crédifo Fiscal</th><th>Origen del Credito</th><th>Monto</th><th>Contribuyente</th><th>Numero de control</th></tr></thead>
            <tbody>
                @foreach($bien->creditos as $credito)
                <tr>
                    <td>{{$credito->folio}}</td>
                    <td>{{$credito->origen_credito}}</td>
                    <td>${{number_format($credito->monto, 2)}}</td>
                    @if($credito->contribuyente->nombre)
                        <td>{{$credito->contribuyente->nombre." ".$credito->contribuyente->apellido_paterno." ".$credito->contribuyente->apellido_materno}}</td>
                    @else
                        <td>{{$credito->contribuyente->razon_social}}</td>
                    @endif
                    <td>{{$credito->pivot->bienes_numero_control}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>