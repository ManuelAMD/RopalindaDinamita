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
		$old = $request->old();
		$email = $old['email'];
		$password = Hash::make($old['password']); 
		$name = $old['name'];
		$lastName = $old['lastName'];
		$phoneNumber = $old['celular'];
		$birthDate = $old['bday'];
		$sex = $old['gender'];
		$rfc = $info['rfc'];
		$country = $info['country'];
		$state = $info['state'];
		$municipality = $info['municipally'];
		$street = $info['street'];
		$colony = $info['colony'];
		$ext = $info['ext'];
		$int = $info['int'];
		$cp = $info['cp'];
		$values=[$rfc, $lastName,$name,$cp,$colony,$street,$ext,$int,$phoneNumber,$birthDate,$country,$state,$municipality,$email,$password,$sex];
		DB::statement('RegistroUsuario ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?',$values);
	}

	  protected  $table  ='Usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UsuarioID','correo', 'rfc', 'nombre', 'apellido','celular',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña', 'remember_token',
    ];
}