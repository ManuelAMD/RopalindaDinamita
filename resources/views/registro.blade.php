<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="/css/registro.css">
	<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
</head>
<body style="background: #efe3ed">
	<header style="background: #a163bd">
		<label for="">Ropa Linda</label> 
		<label id="sesion" style="margin-left: 18em">Iniciar sesión</label>
	</header>
	<span id="cuenta">Crear cuenta</span>
	<form id="table-form" action="{{route('registro2')}}" method="POST">
        {{ csrf_field ()}}
	<div class="datos">
		<label for="">Correo electrónico</label><br><br>
		<label for="">Contraseña</label><br><br>
		<label for="">Nombre(s)</label><br><br>
		<label for="">Apellido(s)</label><br><br>
		<label for="">Numero de celular</label><br><br>
		<label for="">Fecha de nacimiento</label><br><br>
		<label for="">Sexo</label><br>
	</div>
	<div class="cuadros-datos">
		<input type="email" name="email" id="correo" required=""><br><br>
		<input type="password" id="clave" required=""><br><br>
		<input type="text" id="nombre" required=""><br><br>
		<input type="text" id="apellido" required=""><br><br>
		<select>
  			<option value="Mexico">+52</option>
		</select>
		<input type="text" id="celular" required=""><br><br>
		<input type="date" name="bday" min="1930-01-02" id="nacimiento" required=""><br><br>
		<input type="radio" name="gender" value="h" checked id="h" >
		<label for="h" id="hombre">Hombre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value="m" id="m">
        <label for="m" id="mujer">Mujer</label>
	</div>
	<button id="siguiente" action="{{route('registro2')}}">Siguiente</button>
</body>
</html>