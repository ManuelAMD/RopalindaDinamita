<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class LoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest',['only'=>'index']);
	}
    public function index()
    {
    	return view('login');
    }

    public function log()
    {
    	$credentials = $this->validate(request(),[
    		$this->username() => 'required|string',
    		'password' => 'required|string'
    	]);
		if(!Auth::attempt($credentials))
		{
			return redirect('login');
		}
        $values=[Auth::User()->correo,Auth::User()->password];
        $result=DB::select('exec LoginRopaLinda ?,?',$values)[0];
        Session::put('type',head($result));
        if(head($result)=='111')
        {
            $nombre=DB::table('Cliente')->select('rfc', 'nombre', 'apellido', 'celular')->where('correo','=',Auth::User()->correo)->get();
            Session::put('rfc',$nombre[0]->rfc);
            Session::put('nombre',$nombre[0]->nombre);
            Session::put('apellido',$nombre[0]->apellido);
            Session::put('celular',$nombre[0]->celular);
        }
    	return redirect('/');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
    public function username()
    {
    	return 'correo';
    }
}
