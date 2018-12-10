@extends('layouts.app')

@section('content')
<span>Selecciona un método de pago.</span>
<br>
<span>Métodos Guardados</span>
<br>
<input type="radio">Nombre titular de tarjeta, tipo de tarjeta, terminacion.
<br>
<button>Seleccionar</button>

<span>Otros medios</span>

<form action="">
	<input type="radio">Tarjeta de Debito
	<input type="radio">Tarjeta de Crédito
	<input type="radio">Deposito en Puntos de Pago
</form>

<img src="img/tarjeta1.png" alt="">Tarjeta de Debito

<nav>
<input type="text" placeholder="Numero de la Tarjeta">
<input type="text" placeholder="Nombre y Apellidos">
<input type="text" placeholder="Fecha Expiracion">
<input type="text" placeholder="CVV">
</nav>
<button>Agregar</button>

<img src="img/billete.png" alt="">Depositos en punto de Pago

<form action="">
	<input type="radio">Banamex
	<input type="radio">BBVA Bancomer
	<input type="radio">OXXO
</form>

<button>Escoger</button>