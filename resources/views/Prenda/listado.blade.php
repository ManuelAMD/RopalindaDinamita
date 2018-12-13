@extends('layouts.app')

@section('content')
    <a  href="{{route('Prenda.create')}}" class="btn btn.info"><span align="center" class="btn btn-outline-primary"" >Nuevo</span></a>

    <table border =1 align="center">

        <thead>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Opciones</td>
        </thead>
        <tbody>
            @foreach ($prendas as $prenda)
                <tr>
                    <td>{{  $prenda->imagen }}</td>
                    <td>{{  $prenda->nombre  }}</td>
                    <td>{{  $prenda->descripcion  }}</td>
                   
                    <td> 
                        <a align="center" href="{{route('Prenda.destroy',$prenda->prendaID)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                      
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection