<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Project;


class AboutController extends Controller
{
    public function index()
    {
        return view('principal');
    }
}
