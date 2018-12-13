<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Redirect;

class PrincipalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
        return view('principal');
    }
}
