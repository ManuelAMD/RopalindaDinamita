<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="/css/registro2.css">
	<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
</head>
<body style="background: #efe3ed">
	<header style="background: #a163bd">
		<label for="">Ropa Linda</label> 
		<label id="sesion" style="margin-left: 18em">Iniciar sesión</label>
	</header>
	<span id="titulo">Información adicional</span>
	<form id="table-form" action="{{route('financing')}}" method="POST">
        {{ csrf_field ()}}
	<div class="datos">
		<label for="">RFC</label><br><br>
		<label for="">País</label><br><br>
		<label for="">Estado</label><br><br>
		<label for="">Municipio</label><br><br>
		<label for="">Calle</label><br><br>
		<label for="">Colonia</label><br><br>
		<label for="">Núm. Exterior</label>
		<label for="" id="int">Núm. Interior</label><br><br>
		<label for="">Código postal</label>
	</div>
	<div class="cuadros-datos">
		<input type="text"><br><br>
		<input type="text"><br><br>
		<input type="text"><br><br>
		<input type="text"><br><br>
		<input type="text"><br><br>
		<input type="text"><br><br>
		<input type="text" id="exttxt">
		<input type="text" id="inttxt"><br><br>
		<input type="text" id="cp"><br>
	</div>
	<button id="fin">Finalizar</button>
</body>
</html>