@extends('layouts.app')

@section('content')
<h1>Carrito</h1>

<?php
$array = array(
    detalle => "Hola",
    cantidad => "1",
    precio => "1000",
    total => "1000"
);
?>

@foreach()
<div>
	<img src="" alt="">
	<label for="Detalle">{{$detalle}}</label>
	<label for="Cantidad">{{$cantidad}}</label>
	<label for="Precio">{{$precio}}</label>
	<span>Eliminar</span>
	<span>Modificar</span>
</div>
@endforeach


<span>Total</span>
{{$total}}
<button>Comprar</button>
@endsection

