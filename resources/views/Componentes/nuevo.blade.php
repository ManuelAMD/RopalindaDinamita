@extends('layouts.app')

@section('content')

  
    {!! Form::open(['route'=>'Componente.store','method'=>'POST','files'=>true]) !!}
    {{ csrf_field() }}

            

      <div class="datos">
        <h1  align="center">Registro de componente</h1>
        <div class="form-group">
            {!! Form::label('nombre','Nombre')!!}
            {!! Form::text('nombre',null, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion','Descripción')!!}
            {!! Form::text('descripcion',null, ['class'=>'form-control','placeholder'=>'Descripción del artículo','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('precio','Precio')!!}
            {!! Form::text('precio',null, ['class'=>'form-control','placeholder'=>'precio','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('imagenID','Imagen borrar')!!}
            {!! Form::file('imagen')!!}
        </div>
         
         {!! Form::submit('Registrar componente') !!}
          {!! Form::reset('limpiar formulario') !!}
       </div>
        

    {!! Form::close() !!}

@endsection('content')



