@extends('layouts.app')

@section('content')
    <a  href="{{route('Componente.create')}}" class="btn btn.info"><span align="center" class="btn btn-outline-primary"" >Nuevo</span></a>

    <table border =1 align="center">

        <thead>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Opciones</td>
        </thead>
        <tbody>
            @foreach ($componentes as $Componente)
                <tr>
                    <td> {{$Componente->imagen}}</td>
                    <td> {{$Componente->nombre}}</td>
                    <td> {{$Componente->descripcion}}</td>
                   
                    <td> 
                         <a align="center" href="{{route('Componente.destroy',$Componente->componenteID)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                      
                      
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection