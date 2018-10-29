@extends('layouts.app')

@section('content')
	<form id="table-form" action="{{route('finish')}}" method="POST">
	<span id="titulo">Información adicional</span>
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
		<input type="text" id="rfc" name="rfc" required=""><br><br>
		<input type="text" id="pais" name="country" required=""><br><br>
		<input type="text" id="estado" name="state" required=""><br><br>
		<input type="text" id="municipio" name="municipally" required=""><br><br>
		<input type="text" id="calle" name="street" required=""><br><br>
		<input type="text" id="colonia" name="colony" required=""><br><br>
		<input type="text" id="exttxt" name="ext" required="">
		<input type="text" id="inttxt" name="int"><br><br>
		<input type="text" id="cp" name="cp" required=""><br>
	</div>
	<button id="fin">Finalizar</button>
	</form>
@endsection