<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class Usuario extends Model
{
	public function registrar(Request $request){
		$info = $request->all();
		$correo = $info['correo'];
		$password = Hash::make($info['password']); 
		$nombre = $info['nombre'];
		$apellido = $info['apellido'];
		$celular = $info['celular'];
		$rfc = $info['rfc'];
		$values=[$correo, $password, $rfc, $nombre, $apellido, $celular];
		DB::statement('RegistroUsuario ?,?,?,?,?,?',$values);
	}

	  protected  $table  ='User_table';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rfc', 'lastname', 'name', 'cp' ,'street', 'numExterior', 'numInterior', 'cellphone', 'birthdate', 'country', 'state', 'municipallity', 'email', 'sexo', 'tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}