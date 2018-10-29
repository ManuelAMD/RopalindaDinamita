@extends('layouts.app')

@section('content')
<center>
<div class="hpanel">
    <div class="panel-body">
        <form method="POST" action="{{ route('login') }}" style="color: black;">
            @csrf
            <h3>Iniciar sesión</h3><br>
            <div class="login">
                <label class="correo">Correo electrónico</label><br>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="ejemplo@gmail.com" required autofocus>
                    <br>
                    <br>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="login2">
                <label for="password" class="clave">Contraseña</label><br>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" title="Porfavor ingrese su contraseña" placeholder="******" required>
                <br>
                @if ($errors->has(''))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <br>
            <button class="btnEntrar" style="background:#a163bd">Entrar</button>
        </form>
        <br>
        <br>
        <form action="{{route('registrar')}}" method="POST">
        {{ csrf_field() }} 
        <div class="registro">
            <label class="Registra-label">¿Eres Nuevo en RopaLinda?</label><br>
            <button id="Registro-btn" style="background: #9c9ea1">Crea tu cuenta</button>
        </div>
        </form>
    </div>
</div>
</center>
@endsection
