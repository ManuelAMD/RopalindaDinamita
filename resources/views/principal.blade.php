@extends('layouts.app')

@section('content')
<div class="contenedor">
	<div class="atras botones">
		&#60
	</div>
	<br>
	<div class="adelante botones">
		&#62
	</div>
<img src="{{ asset('img/principal.jpg') }}" alt="" style="margin-left: 70px;" id="imagen">
</div>
<script src="js/principal.js"></script>

<span class="vendido">Los mas Vendidos</span>
<div class="container">
	@foreach ($prendas as $prenda)
		{{$prenda->Nombre}}
	@endforeach
	</div>
	{{ $prendas->links() }}
@endsection
