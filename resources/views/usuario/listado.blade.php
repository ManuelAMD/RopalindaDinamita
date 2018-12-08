@extends('layouts.app')

@section('content')
    <a href="{{route('registro')}}" class="btn btn.info"><span class="btn btn-outline-primary"" >Nuevo</span></a>
    <table border =1 align="center">

        <thead align="center">
            <td>Nombre</td>
            <td>Correo</td>
            <td>RFC</td>
            <td>outstanding</td>
            <td>Rejected</td>
            <td>Opciones</td>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->mail }}</td>
                    <td>{{ $usuario->rfc    }}</td>
                    <td align="center">{{ $usuario->oustanding    }}</td>
                    
                     <td align="center">{{ $usuario->rejected     }}</td>
                    <td> 
                        <a href="{{route('usuarios.destroy',$usuario->id)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                        <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-warning" ><span class="glyphicon glyphicon-wrench" ></span></a>  
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection