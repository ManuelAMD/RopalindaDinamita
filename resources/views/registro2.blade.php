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
		<input type="text" id="rfc" required=""><br><br>
		<input type="text" id="pais" required=""><br><br>
		<input type="text" id="estado" required=""><br><br>
		<input type="text" id="municipio" required=""><br><br>
		<input type="text" id="calle" required=""><br><br>
		<input type="text" id="colonia" required=""><br><br>
		<input type="text" id="exttxt" required="">
		<input type="text" id="inttxt"><br><br>
		<input type="text" id="cp" required=""><br>
	</div>
	<button id="fin">Finalizar</button>
	</form>
@endsection