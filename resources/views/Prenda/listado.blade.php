@extends('layouts.app')

@section('content')
    <a href="{{route('Prenda.create')}}" class="btn btn.info"><span class="btn btn-outline-primary"" >Nuevo</span></a>
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
            @foreach ($prendas as $prenda)
                <tr>
                    <td>{{  $prenda->imagen }}</td>
                    <td>{{  $prenda->name  }}</td>
                    <td>{{  $prenda->description  }}</td>
                    <td>{{  $prenda->cuantity  }}</td>
                    <td>{{  $prenda->price  }}</td>
                    <td> 
                        <a href="{{route('Prenda.destroy',$prenda->id)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                        <a href="{{route('Prenda.edit',$prenda->id)}}" class="btn btn-warning" ><span class="glyphicon glyphicon-wrench" ></span></a>  
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection