<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

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
    	return redirect('/');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
    public function username()
    {
    	return 'email';
    }
}
