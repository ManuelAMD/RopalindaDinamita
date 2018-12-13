<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected  $table = "Imagen";
    public $timestamps = false;
    protected  $fillable = ['imagenID','Imagen'];
}

