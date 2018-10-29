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

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/', 'PrincipalController@index')->name('logout');
Route::get('/registros/registro', 'UsuarioController@indexRegistro')->name('registro');
Route::get('/principal', 'PrincipalController@index')->name('principal');
Route::get('/autorizaciones',function(){return view('autorizaciones');})->name('autorizaciones');
Route::post('/principal', 'PrincipalController@index')->name('principal');

Route::post('/login')->name('login');
Route::post('/registros/registro', 'UsuarioController@indexRegistro')->name('registro');
Route::post('/registros/registro2', 'UsuarioController@registrarParte')->name('registro2');
Route::post('/autorizaciones', 'autorizacionesController@index')->name('autorizaciones');
Route::post('/login', 'UsuarioController@registrarTotal')->name('finish');