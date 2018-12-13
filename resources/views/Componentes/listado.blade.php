@extends('layouts.app')

@section('content')
    <a  href="{{route('Componente.create')}}" class="btn btn.info"><span  class="btn btn-primary" >Nuevo</span></a>

    <table border="0" width="50" align="center" class="table table-striped" >

        <thead border=1>
            <td align="center">Imagen</td>
            <td align="center">Nombre</td>
            <td align="center">Descripción</td>
            <td align="center">Opciones</td>
        </thead>
        <tbody>
            @foreach ($componentes as $Componente)
                <tr>
                    <td align="center"> <img src="/component/{{  $Componente->imagen }}" alt="{{$Componente->nombre}}" height=60" width="60"></td>
                    <td align="center"> {{$Componente->nombre}}</td>
                    <td align="center"> {{$Componente->descripcion}}</td>
                   
                    <td align="center"> 
                         <a align="center" href="{{route('Componente.destroy',$Componente->componenteID)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                      
                      
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection 