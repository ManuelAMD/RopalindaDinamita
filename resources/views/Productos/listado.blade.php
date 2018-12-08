@extends('layouts.app')

@section('content')
    <a href="{{route('productos.create')}}" class="btn btn.info"><span class="btn btn-outline-primary"" >Nuevo</span></a>
    <table border =1 align="center">

        <thead>
            <td>Imagen</td>
            <td>Articulo</td>
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Opciones</td>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{  $producto->imagen }}</td>
                    <td>{{  $producto->name  }}</td>
                    <td>{{  $producto->description  }}</td>
                    <td>{{  $producto->cuantity  }}</td>
                    <td>{{  $producto->price  }}</td>
                    <td> 
                        <a href="{{route('productos.destroy',$producto->id)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                        <a href="{{route('productos.edit',$producto->id)}}" class="btn btn-warning" ><span class="glyphicon glyphicon-wrench" ></span></a>  
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection