@extends('layouts.app')

@section('content') 
<br>
	<div class="panel-body">
		{!! Form::open(['route'=>'Prenda.results','method'=>'GET','class'=> 'navbar-form navbar-left pull-rigth', 'role'=>'search' ]) !!}
		{{csrf_field()}}
			<div class="form-group">

				@if(count($errors)>0)
				<div class="alert alert-danger">
					upload validation error <br><br>
					<ul>
						foreach($errors->all() as $error)
						<li>
							{{$error}}
						</li>
						@endforeach
					</ul>
				 	</div>
				 	@endif

				{!! Form::text ('nombre',null,['class'=>'form-control','placeholder'=>'Busqueda de articulos'])  !!}
			</div>
			<button type="submit"  class="btn btn-default"> Buscar </button>
		{!! Form::close() !!}
		
	</div>
@endsection