<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrendComp extends Model
{
    protected  $table = "PrendaComponente";
    public $timestamps = false;
    protected  $fillable = ['prendaID','componenteID'];

    



}

