<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Image;
use DB;
use App\prenda;
use App\componente;
class Prenda extends Model
{
    protected  $table = "Prenda";
    public $timestamps = false;
    protected  $fillable = ['productoID','prendaID','nombre','precio','descripcion','categoria','imagenID','temporada','personalizable'];

    public function scopeName($query,$nombre){
		
	}


	public function FinalizarRegistroPrenda(Request $request){
		 //dd($request->imagenID);
      $prenda=new Prenda($request->all()); 
       
      $image=$request->file('imagen');
      /*$image->validate($request,[
           'imagen'=>
              'required|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]); */
      $n=rand();
      $new_name = $n.'.'.$image->getClientOriginalExtension();
      $image->move(public_path("images"),$new_name);
        
      $value=[
          $prenda->nombre,
          $prenda->precio,
          $prenda->descripcion,
          $prenda->categoria,
          $n.'.'.$image->getClientOriginalExtension(),
          $prenda->temporada

      ];
      DB::statement('RegistroPrenda ?,?,?,?,?,?',$value);

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

