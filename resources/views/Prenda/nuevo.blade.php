@extends('layouts.app')

@section('content')

  
    {!! Form::open(['route'=>'Prenda.store','method'=>'POST','files'=>true]) !!}
    {{ csrf_field() }}
      <div class="datos">

        <div class="form-group">
            {!! Form::label('nombre','Nombre')!!}
            {!! Form::text('nombre',null, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion','Descripción')!!}
            {!! Form::text('descripcion',null, ['class'=>'form-control','placeholder'=>'Descripción del artículo','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('cantidad','Cantidad')!!}
            {!! Form::text('cantidad',null, ['class'=>'form-control','placeholder'=>'Cantidad del artículo','required'])!!}
        </div>
      
        <div class="form-group">
            {!! Form::label('precio','Precio')!!}
            {!! Form::text('precio',null, ['class'=>'form-control','placeholder'=>'precio','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('imagenID','Imagen borrar')!!}
            {!! Form::file('imagenID')!!}
        </div>
        <div class="form-group">
            {!! Form::label('temporada','Temporada')!!}
            {!! Form::select('temporada', array('1'=>'Primavera','2'=>'Verano','3'=>'Otoño','4'=>'Invierno'));!!}
        </div>
        
        <div class="form-group">
            {!! Form::label('categoria','Categoría')!!}
            {!! Form::select('categoria', array('0'=>'Superior','1'=>'Inferior ','3'=>'Accesorio'));!!}
        </div>
         {!! Form::submit('Registrar articulo') !!}
          {!! Form::reset('limpiar formulario') !!}
       </div>
        

    {!! Form::close() !!}

@endsection('content')



