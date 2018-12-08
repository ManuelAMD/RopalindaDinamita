@extends('layouts.app')
@section('title','Editar usuario'. $producto->id)
@section('content')


  {!! Form::open(array('route' => ['productos.update',$producto->id], 'method' => 'put','files'=>'true')) !!}﻿
 
        
            {!! Form::hidden('id',$producto->id, ['class'=>'form-control','placeholder'=>'id','required'])!!}
         <div class="datos">
        <div class="form-group">
            {!! Form::label('name','Nombre')!!}
            {!! Form::text('name',$producto->name, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Descripción')!!}
            {!! Form::text('description',$producto->description, ['class'=>'form-control','placeholder'=>'Descripción del artículo','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('cuantity','Cantidad')!!}
            {!! Form::text('cuantity',$producto->cuantity, ['class'=>'form-control','placeholder'=>'Cantidad del artículo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('color','Color')!!}
            {!! Form::text('color',$producto->color, ['class'=>'form-control','placeholder'=>'color','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Precio')!!}
            {!! Form::text('price',$producto->price, ['class'=>'form-control','placeholder'=>'precio','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('image','Imagen borrar')!!}
            {!! Form::file( 'image' )!!}
        </div>
        <div class="form-group">
            {!! Form::label('talla','talla')!!}
            {!! Form::select('talla', array('6'=>'6','8'=>'8','10'=>'10','12'=>'12','14'=>'14','16'=>'16','18'=>'18','20'=>'20','22'=>'22'),$producto->talla);!!}
        </div>
        <div class="form-group">
            {!! Form::label('season','Temporada')!!}
            {!! Form::select('season', array('1'=>'Primavera','2'=>'Verano','3'=>'Otoño','4'=>'Invierno'),$producto->season);!!}
        </div>
        <div class="form-group">
            {!! Form::label('available','Disponible')!!}
            {!! Form::select('available', array('0'=>'No disponible','1'=>'Disponible'),$producto->availiable);!!}
        </div>
        <div class="form-group">
            {!! Form::label('category','Categoría')!!}
            {!! Form::select('category', array('0'=>'Superior','1'=>'Inferior ','3'=>'Accesorio'),$producto->category);!!}
        </div>
         {!! Form::submit('Registrar articulo') !!}
          {!! Form::reset('limpiar formulario') !!}
       
        </div>

    {!! Form::close() !!}

@endsection('content')



