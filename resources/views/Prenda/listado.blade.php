@extends('layouts.app')

@section('content')
    <a  href="{{route('Prenda.create')}}" class="btn btn.info"><span align="center" class="btn btn-primary"" >Nuevo</span></a>

    <table   align="center" class="table table-striped">

        <thead border=1>
            <td align="center">Imagen</td>
            <td align="center">Nombre</td>
            <td align="center">Descripción</td>
            <td align="center">Opciones</td>
        </thead>
        <tbody>
            @foreach ($prendas as $prenda)
                <tr>
                    <td align="center"> <img src="/images/{{  $prenda->imagen }}" alt="$prenda->nombre" height="60" width="60"> </td>
                    <td align="center">{{  $prenda->nombre  }}</td>
                    <td align="center">{{  $prenda->descripcion  }}</td>
                    <td align="center"> 
                        <a align="center" href="{{route('Prenda.destroy',$prenda->prendaID)}}" onclick="return confirm('¿Estas seguro de eliminar?')" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-circle" ></span></a>  
                      
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection