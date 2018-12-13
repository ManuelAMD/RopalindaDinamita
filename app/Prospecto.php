<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class Prospecto extends Model
{
	
	protected  $table  ='Prospecto';

    protected $fillable = [
        'usuarioId','correo','contraseña','rfc','nombre','apellido','celular','rechazado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}