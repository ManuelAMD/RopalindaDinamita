@extends('layouts.app')

@section('content')
<div>
	

	 	 {!! Form::open(['route'=>'Prenda.AsignarComponentePrenda','method'=>'PUT','files'=>true]) !!}
    	{{ csrf_field() }}

	   <div  >
	       <table border="0" width="50" align="center" class="w3-table-all" >
		<thead border=1>
			<td align="center" >Selección</td>
	        <td align="center">Imagen</td>
	        <td align="center">Nombre</td>
	        <td align="center">Descripción</td>
	       
	    </thead>
	    <tbody>
				@foreach ($prendas as $prenda)
	                <tr>
	                	<td><input type="checkbox" value="{{  $prenda->prendaID  }}" name="P{{  $prenda->prendaID  }}"  ></td>
	                    <td align="center"> <img src="/images/{{  $prenda->imagen }}" alt="$prenda->nombre" height="60" width="60"> </td>
	                    <td align="center">{{  $prenda->nombre  }}</td>
	                    <td align="center">{{  $prenda->descripcion  }}</td>
	                   
	                </tr>
	            @endforeach
	    <tbody>
	    </table>
	</div>
	<br><br>

	<div  >
	       <table border="0" width="50" align="center" class="w3-table-all" >
		<thead border=1>
			<td align="center">Selección</td>
	        <td align="center">Imagen</td>
	        <td align="center">Nombre</td>
	        <td align="center">Descripción</td>
	       
	    </thead>
	    <tbody>
	        <tr>
	          @foreach ($componentes as $Componente)
	                <tr>
	                	<td width="40"><input type="checkbox"  value="{{$Componente->componenteID }}"   name="C{{$Componente->componenteID }}"></td>
	                    <td align="center"> <img src="/component/{{  $Componente->imagen }}" alt="{{$Componente->nombre}}" height=60" width="60"></td>
	                    <td align="center"> {{$Componente->nombre}}</td>
	                    <td align="center"> {{$Componente->descripcion}}</td>
	                   
	                    

	                </tr>

	            @endforeach
	        </tr>
	    <tbody>
	    </table>
	</div>

	 {!! Form::submit('Asignar componentes') !!}
     {!! Form::reset('limpiar formulario') !!}
     {!! Form::close() !!}
</div>
@endsection 