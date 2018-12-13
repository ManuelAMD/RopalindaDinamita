@extends('layouts.app')

@section('content')
	<span id="cuenta">Crear cuenta</span>
	<form id="table-form" action="{{route('finish')}}" method="POST">
        {{ csrf_field ()}}
	<div class="datos">
		<label for="">Correo electrónico</label><br><br>
		<label for="">Contraseña</label><br><br>
		<label for="">Nombre(s)</label><br><br>
		<label for="">Apellido(s)</label><br><br>
		<label for="">Número de celular</label><br><br>
		<label for="">RFC</label><br><br>
		
	</div>
	<div id="cuadros-datos">
		<input type="email" name="correo" id="correo" required="true"><br><br>
		<input type="password" id="clave" name="password" required="true"><br><br>
		<input type="text" id="nombre" name="nombre" required="true"><br><br>
		<input type="text" id="apellido" name="apellido" required="true"><br><br>
		<input type="text" id="celular" name="celular" required="true"><br><br>
		<input type="text" id="rfc" name="rfc" required="true">
	</div>
	<button id="siguiente" >Registrarse</button>
</form>
@endsection