<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {{Form::label("nombre","Nombre:",["class"=>"col-md-4 control-label"])}}
        <div class="col-md-6">
            {{Form::text("nombre",$user->nombre,["id" => "nombre", "class" => "form-control", "required"])}}
                @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
        </div>
</div>

<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
    {{Form::label("apellido_paterno","Apellido paterno",["class"=>"col-md-4 control-label"])}}
    <div class="col-md-6">
        {{Form::text("apellido_paterno",$user->apellido_paterno,["id"=>"apellido_paterno","class"=>"form-control","required"])}}
            @if ($errors->has('apellido_paterno'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido_paterno') }}</strong>
                </span>
            @endif
    </div>
</div>

<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
    {{Form::label("apellido_materno","Apellido materno",["class"=>"col-md-4 control-label"])}}
    <div class="col-md-6">
        {{Form::text("apellido_paterno",$user->apellido_materno,["id"=>"apellido_materno","class"=>"form-control","required"])}}
        @if ($errors->has('apellido_materno'))
            <span class="help-block">
                <strong>{{ $errors->first('apellido_materno') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{Form::label("email","Correo Electronico",["class"=>"col-md-4 control-label"])}}
    <div class="col-md-6">
        {{Form::email("email",$user->email,["id"=>"email", "class"=>"form-control", "required"])}}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>