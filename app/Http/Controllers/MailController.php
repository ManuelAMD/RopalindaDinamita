<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    //
    public function send(){
    	Mail::send(['text'=>'mail'],['name','sarkthak'],function($message){
    		$message->to('zyan1227@gmail.com','papi')->subject('Holis');
    		$message->from('zyan1227@gmail.com','holis');
    	});
    	return redirect('login');
    	
    }

}
