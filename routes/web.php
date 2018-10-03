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

Route::get('/', function () {
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

Route::get('/registros/registro2', 'UsuarioController@registrarTotal')->name('registro2');
Route::get('/registros/registro', 'UsuarioController@registrarParte')->name('registro');