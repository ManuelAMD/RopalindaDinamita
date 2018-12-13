<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected  $table = "Componente";
    public $timestamps = false;
    protected  $fillable = ['componenteID','nombre','precio','descripcion','imagen'];

    



}

