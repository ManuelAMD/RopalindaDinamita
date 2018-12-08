@extends('layouts.app')
@section('title','Editar usuario')
@section('content')
Carbon::createFromTimestamp

  {!! Form::open(array('route' => ['usuarios.update',$usuario->id], 'method' => 'put','files'=>'true')) !!}﻿
 
        <div class="datos">
            {!! Form::hidden('id',$usuario->id, ['class'=>'form-control','placeholder'=>'id','required'])!!}
        
        <div class="form-group">
            {!! Form::label('name','Nombre')!!}
            {!! Form::text('name',$usuario->name, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('rfc','R.F.C.')!!}
            {!! Form::text('rfc',$usuario->rfc, ['class'=>'form-control','placeholder'=>'R.F.C.','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('lastName','Apellidos')!!}
            {!! Form::text('lastName',$usuario->lastName, ['class'=>'form-control','placeholder'=>'Apellidos','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('cellphone','Número Celular')!!}
            {!! Form::text('cellphone',$usuario->cellphone, ['class'=>'form-control','placeholder'=>'Número celular','required'])!!}
        </div>
          <div class="form-group">
            {!! Form::label('birthDate','Fecha de nacimiento')!!}
            {!! Form::date('birthDate',old(birthName), ['class'=>'form-control','placeholder'=>'Fecha de nacimiento','required',])!!}
        </div>






        <div class="form-group">
            {!! Form::label('postalCode','Código postal')!!}
            {!! Form::text('postalCode',$usuario->postalCode, ['class'=>'form-control','placeholder'=>'Código postal','required'])!!}
        </div>
         <div class="form-group">
            {!! Form::label('colony','Colonia')!!}
            {!! Form::text('colony',$usuario->colony, ['class'=>'form-control','placeholder'=>'Colonia','required'])!!}
        </div>
         <div class="form-group">
            {!! Form::label('street','Calle')!!}
            {!! Form::text('street',$usuario->street, ['class'=>'form-control','placeholder'=>'Calle','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('numExt','Número exterior')!!}
            {!! Form::text('numExt',$usuario->numExt, ['class'=>'form-control','placeholder'=>'Número exterior','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('numInt','Número interior')!!}
            {!! Form::text('numInt',$usuario->numInt, ['class'=>'form-control','placeholder'=>'Número interior'])!!}
        </div>







         {!! Form::submit('Registrar articulo') !!}
          {!! Form::reset('limpiar formulario') !!}
       
        
     </div>
    {!! Form::close() !!}

@endsection('content')



