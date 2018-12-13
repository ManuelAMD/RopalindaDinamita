@extends('layouts.app')

@section('content')

 
    <table border =1 align="center" class="table table-striped">

        <thead align="center">
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>R.F.C.</td>
            <td>Celular</td>
            <td>Status</td>
            <td>Opciones</td>
        </thead>
        <tbody>
            @foreach ($prospectos as $prospecto)
                <tr>
                    <td>{{ $prospecto->nombre }}</td>
                    <td>{{ $prospecto->apellido }}</td>
                    <td>{{ $prospecto->correo    }}</td>
                    <td>{{ $prospecto->rfc    }}</td>
                    <td>{{ $prospecto->celular    }}</td>
                    <td>{{ $prospecto->rechazado    }}</td>
                    <td> 
                        <a href="{{route('prospecto.rechazar',$prospecto->correo)}}" onclick="return confirm('¿Estás seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove" ></span></a>  
                        <a href="{{route('prospecto.aceptar',$prospecto->correo)}}" onclick="return confirm('¿Estás seguro de aceptar?')" class=" btn btn-success" ><span class="glyphicon glyphicon-ok" ></span></a>  
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>


@endsection