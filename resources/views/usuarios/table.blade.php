<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Nombre</th><th>Correo</th><th>Rol</th><th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->nombre." ".$usuario->apellido_paterno." ".$usuario->apellido_materno}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->rol->nombre}}</td>
                    <td>
                        <a href="{{route('usuarios.edit', ['id' => $usuario->id])}}"> 
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>