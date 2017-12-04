<table class="table">
    <thead>
        <tr>
            <th>Nombre</th><th>Correo</th><th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($usuarios as $usuario)
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->rol->nombre}}</td>
            @endforeach
        </tr>
    </tbody>
</table>