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
		if(!Auth::attempt($credentials,true))
		{
			return redirect('login');
		}
        Session::put('t','aaaa');
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
    protected function guard()
    {
        return Auth::guard('api');
    }
}
