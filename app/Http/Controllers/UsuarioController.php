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
	public function indexRegistro()
	{
		return view('registro');
	}
	public function registrarParte(Request $request)
	{
		if($_POST)
		{
			Session::put('email',$request->input('correo'));
			Session::put('password',$request->input('clave'));
			Session::put('name',$request->input('nombre'));
			Session::put('lastName',$request->input('apellido'));
			Session::put('phoneNumber',$request->input('celular'));
			Session::put('birthDate',$request->input('nacimiento'));
			Session::put('sex',Input::only('h','m'));
		}
		return view('registro2');
	}
	public function registrarParte2(Request $request)
	{
		if($_POST)
		{
			Session::put('rfc',$request->input('rfc'));
			Session::put('country',$request->input('pais'));
			Session::put('state',$request->input('estado'));
			Session::put('municipality',$request->input('municipio'));
			Session::put('street',$request->input('calle'));
			Session::put('colony',$request->input('colonia'));
			Session::put('ext',$request->input('exttxt'));
			Session::put('int',$request->input('inttxt'));
			Session::put('cp',$request->input('cp'));
		}
		return view('registro2');
	}
	public function registrarTotal(Request $request)
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
			$rfc = Input::get('rfc');
			$country = $request->input('country');
			$state = $request->input('state');
			$municipality = $request->input('municipality');
			$street = $request->input('street');
			$colony = $request->input('colony');
			$ext = $request->input('ext');
			$int = $request->input('int');
			$cp = $request->input('cp');
			//$usuario = Usuario();
			$values=[$rfc, $lastName,$name,$cp,$colony,$street,$ext,$int,$phoneNumber,$birthDate,$country,$state,$municipality,$email,$password,$sex];
			//error_log($rfc);
			/*DB::select('EXEC RegistroUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($rfc, $lastName,$name,$cp,$colony,$street,$ext,$int,$phoneNumber,$birthDate,$country,$state,$municipality,$email,$password,$sex));*/
			//DB::beginTransaction('EXEC RegistroUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$values);

		}
		return Redirect::to('login');
	}
}