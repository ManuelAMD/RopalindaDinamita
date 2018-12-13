<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\componente;
use Illuminate\Http\Request;
use DB;
class Componente extends Model
{
    protected  $table = "Componente";
    public $timestamps = false;
    protected  $fillable = ['componenteID','nombre','precio','descripcion','imagen'];

    public function finalizarRegistroComponente(Request $request){
      $Componente=new Componente($request->all()); 
      $image=$request->file('imagen');
      
      $n=rand();
      $new_name = $n.'.'.$image->getClientOriginalExtension();
      $image->move(public_path("component"),$new_name);
        
      $value=[
          $Componente->nombre,
          $Componente->precio,
          $Componente->descripcion,
          $n.'.'.$image->getClientOriginalExtension()
      ];
       DB::statement('RegistrarComponente ?,?,?,?',$value);
    }

}

