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
use App\Usuario;

class UsuarioController extends Controller
{	
	public function indexRegistro()
	{
		return view('registro');
	}
	public function registrarParte(Request $request)
	{
		$request->flash();//Guarda la información de este regiatro.	
		return view('registro2');
	}
	public function registrarTotal(Request $request)
	{
		$usuario = new Usuario;
		$usuario->registrar($request);
		return redirect('login');
	}
}