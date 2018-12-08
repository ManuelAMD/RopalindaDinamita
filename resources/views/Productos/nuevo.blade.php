@extends('layouts.app')

@section('content')

  
    {!! Form::open(['route'=>'productos.store','method'=>'POST']) !!}
      <div class="datos">
        <div class="form-group">
            {!! Form::label('name','Nombre')!!}
            {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Descripción')!!}
            {!! Form::text('description',null, ['class'=>'form-control','placeholder'=>'Descripción del artículo','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('cuantity','Cantidad')!!}
            {!! Form::text('cuantity',null, ['class'=>'form-control','placeholder'=>'Cantidad del artículo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('color','Color')!!}
            {!! Form::text('color',null, ['class'=>'form-control','placeholder'=>'color','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Precio')!!}
            {!! Form::text('price',null, ['class'=>'form-control','placeholder'=>'precio','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('image','Imagen borrar')!!}
            {!! Form::file('image')!!}
        </div>
        <div class="form-group">
            {!! Form::label('talla','talla')!!}
            {!! Form::select('talla', array('6'=>'6','8'=>'8','10'=>'10','12'=>'12','14'=>'14','16'=>'16','18'=>'18','20'=>'20','22'=>'22'));!!}
        </div>
        <div class="form-group">
            {!! Form::label('season','Temporada')!!}
            {!! Form::select('season', array('1'=>'Primavera','2'=>'Verano','3'=>'Otoño','4'=>'Invierno'));!!}
        </div>
        <div class="form-group">
            {!! Form::label('available','Disponible')!!}
            {!! Form::select('available', array('0'=>'No disponible','1'=>'Disponible'));!!}
        </div>
        <div class="form-group">
            {!! Form::label('category','Categoría')!!}
            {!! Form::select('category', array('0'=>'Superior','1'=>'Inferior ','3'=>'Accesorio'));!!}
        </div>
         {!! Form::submit('Registrar articulo') !!}
          {!! Form::reset('limpiar formulario') !!}
       </div>
        

    {!! Form::close() !!}

@endsection('content')



