<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
	
	public function registrarParte()
	{
		if($_POST)
		{
			Session::put('email',Input::get('correo'));
			Session::put('password',Input::get('clave'));
			Session::put('name',Input::get('nombre'));
			Session::put('lastName',Input::get('apellido'));
			Session::put('phoneNumber',Input::get('celular'));
			Session::put('birthDate',Input::get('nacimiento'));
			Session::put('sex',Input::only('h','m'));
		}
		return view('registro');
	}
	public function registrarParte2()
	{
		if($_POST)
		{
			Session::put('rfc',Input::get('rfc'));
			Session::put('country',Input::get('pais'));
			Session::put('state',Input::get('estado'));
			Session::put('municipality',Input::get('municipio'));
			Session::put('street',Input::get('calle'));
			Session::put('colony',Input::get('colonia'));
			Session::put('ext',Input::get('exttxt'));
			Session::put('int',Input::get('inttxt'));
			Session::put('cp',Input::get('cp'));
		}
		return view('registro2');
	}
	public function registrarTotal()
	{
		if($_POST)
		{
			$email = Session::get('email');
			$password = Session::get('password');
			$name = Session::get('name');
			$lastName = Session::get('lastName');
			$phoneNumber = Session::get('phoneNumber');
			$birthDate = Session::get('birthDate');
			$sex = Session::get('sex');
			$rfc = Session::get('rfc');
			$country = Session::get('country');
			$state = Session::get('state');
			$municipality = Session::get('municipality');
			$street = Session::get('street');
			$colony = Session::get('colony');
			$ext = Session::get('ext');
			$int = Session::get('int');
			$cp = Session::get('cp');
			$values=[$rfc, $lastName,$name,$cp,$colony,$street,$ext,$int,$phoneNumber,$birthDate,$country,$state,$municipality,$email,$password,$sex];
			error_log($rfc);
			/*DB::select('EXEC RegistroUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($rfc, $lastName,$name,$cp,$colony,$street,$ext,$int,$phoneNumber,$birthDate,$country,$state,$municipality,$email,$password,$sex));*/
			DB::beginTransaction('EXEC RegistroUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$values);

		}
		return Redirect::to('login');
	}
}