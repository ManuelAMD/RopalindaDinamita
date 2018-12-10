@extends('layouts.app')
@section('title','Editar usuario'. $prenda->id)
@section('content')


  {!! Form::open(array('route' => ['Prenda.update',$prenda->id], 'method' => 'put','files'=>'true')) !!}﻿
 
        
        {!! Form::hidden('id',$prenda->id, ['class'=>'form-control','placeholder'=>'id','required'])!!}
        <div class="datos">
        <div class="form-group">
            {!! Form::label('name','Nombre')!!}
            {!! Form::text('name',$prenda->name, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Descripción')!!}
            {!! Form::text('description',$prenda->description, ['class'=>'form-control','placeholder'=>'Descripción del artículo','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('cuantity','Cantidad')!!}
            {!! Form::text('cuantity',$prenda->cuantity, ['class'=>'form-control','placeholder'=>'Cantidad del artículo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Precio')!!}
            {!! Form::text('price',$prenda->price, ['class'=>'form-control','placeholder'=>'precio','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('image','Imagen borrar')!!}
            {!! Form::file( 'image' )!!}
        </div>
        <div class="form-group">
            {!! Form::label('season','Temporada')!!}
            {!! Form::select('season', array('1'=>'Primavera','2'=>'Verano','3'=>'Otoño','4'=>'Invierno'),$prenda->season);!!}
        </div>
        <div class="form-group">
            {!! Form::label('category','Categoría')!!}
            {!! Form::select('category', array('0'=>'Superior','1'=>'Inferior ','3'=>'Accesorio'),$prenda->category);!!}
        </div>
         {!! Form::submit('Registrar articulo') !!}
          {!! Form::reset('limpiar formulario') !!}
       
        </div>

    {!! Form::close() !!}

@endsection('content')



