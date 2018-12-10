@extends('layouts.app')

@section('content') 
<br>
	<div class="panel-body">
		{!! Form::open(['route'=>'Prenda.results','method'=>'GET','class'=> 'navbar-form navbar-left pull-rigth', 'role'=>'search' ]) !!}
			<div class="form-group">


				 	
				{!! Form::text ('nombre',null,['class'=>'form-control','placeholder'=>'Busqueda de articulos'])  !!}
			</div>
			<button type="submit"  class="btn btn-default"> Buscar </button>
		{!! Form::close() !!}
		
	</div>
@endsection