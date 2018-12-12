@extends('layouts.app')

@section('content')
        <center><div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}" style="color: black;">
                        @csrf
                        @if($errors->any())
                           <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first() }}</strong>
                            </span>
                        @endif
                        <h3>Inicia sesión</h3><br>
                    <div class="login">
                        <div class="correo-grupo">
                            <label class="correo">Correo electrónico</label><br>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="correo" placeholder="ejemplo@gmail.com" required autofocus value="{{old('email')}}">
                            <br>
                             @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="login2">
                            <label class="clave">Contraseña</label><br>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" title="Porfavor ingrese su contraseña" placeholder="******" required class="form-control">
                            <br>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <br>
                        <button class="btnEntrar" style="background:#a163bd">Entrar</button>
                    </form>
                        <br>
                        <br>
                        </div>
                    <form action="{{route('registro')}}" method="POST">
                        {{ csrf_field() }} 
                        <div class="registro">
                            <label class="Registra-label">¿Eres Nuevo en RopaLinda?</label><br>
                            <button id="Registro-btn" style="background: #9c9ea1">Crea tu cuenta</button>
                        </div>
                    </form>
                    </div>
        </center></div>
            </div>
        </div>
    </div>
    
</div>

@endsection

	
