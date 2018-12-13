@extends('layouts.app')

@section('content')

  
    {!! Form::open(['route'=>['Prenda.update',$prenda->prendaID],'method'=>'PUT','files'=>true]) !!}
    {{ csrf_field() }}
      <div class="datos">
        {!! Form::hidden('prendaID',$prenda->prendaID, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}

        <div class="form-group">
            {!! Form::label('nombre','Nombre')!!}
            {!! Form::text('nombre',$prenda->nombre, ['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion','Descripción')!!}
            {!! Form::text('descripcion',$prenda->descripcion, ['class'=>'form-control','placeholder'=>'Descripción del artículo','required'])!!}
        </div>

         
      
        <div class="form-group">
            {!! Form::label('precio','Precio')!!}
            {!! Form::text('precio',$prenda->precio, ['class'=>'form-control','placeholder'=>'precio','required'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('imagenID','Imagen borrar')!!}
            {!! Form::file('imagen')!!}
        </div>
        <div class="form-group">
            {!! Form::label('temporada','Temporada')!!}
            {!! Form::select('temporada', array('1'=>'Primavera','2'=>'Verano','3'=>'Otoño','4'=>'Invierno'),$prenda->temporada);!!}
        </div>
        
        <div class="form-group">
            {!! Form::label('categoria','Categoría')!!}
            {!! Form::select('categoria', array('0'=>'Superior','1'=>'Inferior ','3'=>'Accesorio'),$prenda->categoria);!!}
        </div>
         {!! Form::submit('Actualizar articulo') !!}
          {!! Form::reset('Limpiar formulario') !!}
       </div>
        

    {!! Form::close() !!}

@endsection('content')



