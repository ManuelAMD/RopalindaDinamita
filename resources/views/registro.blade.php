@extends('layouts.app')

@section('content')
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
	<div id="cuadros-datos">
		<input type="email" name="email" id="correo" required=""><br><br>
		<input type="password" id="clave" name="password" required=""><br><br>
		<input type="text" id="nombre" name="name" required=""><br><br>
		<input type="text" id="apellido" name="lastName" required=""><br><br>
		<select>
  			<option value="Mexico">+52</option>
		</select>
		<input type="text" id="celular" name="celular" required=""><br><br>
		<input type="date" name="bday" min="1930-01-02" id="nacimiento" required=""><br><br>
		<input type="radio" name="gender" value="h" checked id="h" >
		<label for="h" id="hombre">Hombre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value="m" id="m">
        <label for="m" id="mujer">Mujer</label>
	</div>
	<button id="siguiente" >Siguiente</button>
@endsection