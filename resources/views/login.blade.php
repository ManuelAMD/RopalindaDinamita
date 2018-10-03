<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login de Usuario</title>
	<link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
</head>
<body style="background: #efe3ed">
        <h1>RopaLinda</h1>
        {{ csrf_field ()}}
        <center><div class="hpanel">
                <div class="panel-body">
                    <form action="/login/ingresar" method="POST" style="color: black;">
                        {{ csrf_field() }}    
                        <h3>Inicia sesión</h3><br>
                    <div class="login">
                        <div class="correo-grupo">
                            <label class="correo">Correo electrónico</label><br>
                            <input type="text" placeholder="ejemplo@gmail.com" required="" value=""
                             id="username">
                        </div>
                        <div class="login2">
                            <label class="clave">Contraseña</label><br>
                            <input type="password" title="Porfavor ingrese su contraseña" placeholder="******" required="" value="" name="pass" id="password" class="form-control">
                            <br>
                            <br>
                        <button class="btnEntrar" style="background:#a163bd">Entrar</button>
                        <br>
                        <br>
                        </div>
                        <div class="registro">
                            <label class="Registra-label">¿Eres Nuevo en RopaLinda?</label><br>
                            <button id="Registro-btn" style="background: #9c9ea1">Crea tu cuenta</button>
                        </div>
                    </div>
                    </form>
        </center></div>
            </div>
        </div>
    </div>
    
</div>
	
</body>
</html>