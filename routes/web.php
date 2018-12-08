<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/registro2', function () {
    return view('registro2');
});

Route::get('/principal', function () {
    return view('principal');
});

Route::get('/autorizaciones', function () {
    return view('autorizaciones');
});

Route::post('/principal', 'PrincipalController@index')->name('principal');
Route::post('/login')->name('login');
Route::post('/registros/registro', 'UsuarioController@registrarParte')->name('registro');
Route::post('/registros/registro2', 'UsuarioController@registrarParte2')->name('registro2');
Route::post('/login', 'UsuarioController@registrarTotal')->name('finish');*/

Auth::routes();

Route::get('/', 'PrincipalController@index')->name('logout'); 
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout'); 
Route::get('/registros/registro', 'UsuarioController@indexRegistro')->name('registro');
Route::get('/principal', 'PrincipalController@index')->name('principal');



//--f
	Route::group(['prefix'=> 'productos'],function(){
		Route::resource('productos','ProductController');
		Route::get('productos/{id}/destroy',
		 	['uses' =>'ProductController@destroy',
		 	'as'	=>'productos.destroy'
		 	]);
	  	Route::get('productos/{id}/edit',
		 	['uses' =>'ProductController@edit',
		 	'as'	=>'productos.edit'
		 	]);
	    
	});


	Route::get('/send','MailController@send');
	Route::group(['prefix'=> 'Admin'],function(){
		Route::resource('usuarios','UsuarioController');
		 
	    
	});
//--f
//Route::get('/autorizaciones',function(){return view('autorizaciones');})->name('autorizaciones');

Route::post('/login','LoginController@log')->name('login');
Route::post('/registros/registro', 'UsuarioController@indexRegistro')->name('registro');
Route::post('/registros/registro2', 'UsuarioController@registrarParte')->name('registro2');
//Route::post('/autorizaciones', 'autorizacionesController@index')->name('autorizaciones');   descomentar
Route::post('/registros/registrar', 'UsuarioController@registrarTotal')->name('finish');
Route::get('/info',function(){
	dd(Auth::User());
})->name('info');
//Auth::routes(); /*Rutas para authenticacion*/

Route::get('/home', 'HomeController@index')->name('home');
