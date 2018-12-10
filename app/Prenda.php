<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    protected  $table = "Prenda";
    public $timestamps = false;
    protected  $fillable = ['productoID','prendaID','nombre','precio','descripcion','categoria','imagenID','temporada','personalizable'];

    public function scopeName($query,$nombre){
		
	} 



}

