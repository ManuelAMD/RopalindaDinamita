@extends('layouts.app')

@section('content')
        <center><div class="hpanel">
                <div class="panel-body">
                    <form action="{{route('principal')}}" method="POST" style="color: black;">
                        {{ csrf_field() }}    
                        <h3>Inicia sesión</h3><br>
                    <div class="login">
                        <div class="correo-grupo">
                            <label class="correo">Correo electrónico</label><br>
                            <input type="text" placeholder="ejemplo@gmail.com" value=""
                             id="username">
                        </div>
                        <div class="login2">
                            <label class="clave">Contraseña</label><br>
                            <input type="password" title="Porfavor ingrese su contraseña" placeholder="******" value="" name="pass" id="password" class="form-control">
                            <br>
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

	
