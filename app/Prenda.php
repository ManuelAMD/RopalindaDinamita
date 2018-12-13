<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Prenda extends Model
{
    protected  $table = "Prenda";
    public $timestamps = false;
    protected  $fillable = ['productoID','prendaID','nombre','precio','descripcion','categoria','imagenID','temporada','personalizable'];

    public function scopeName($query,$nombre){
		
	} 

	public function getComponentes($id){
		$componentes=DB::table('PrendaComponente')->select('ComponenteID')->where('PrendaID','=',$id)->get();
		$todoComponentes=array();
		foreach ($componentes as $componente) {
			$compo = DB::table('Componente')->select('ComponenteID','nombre','precio','descripcion')->where('ComponenteID','=',$componente->ComponenteID)->get()[0];
			$todoComponentes[]=$compo;
		}
		return $todoComponentes;
	}

}

