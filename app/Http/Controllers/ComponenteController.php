<?php

namespace App\Http\Controllers;
use App\componente;
use Illuminate\Http\Request;
use DB;
class ComponenteController extends Controller
{
    public function create(){
    	
      	return view ('Componentes.nuevo');  
    }


    public function store(Request $request){
    	
      $Componente=new Componente($request->all()); 
      $image=$request->file('imagen');
      $this->validate($request,[
           'imagen'=>
              'required|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]); 
      $n=rand();
      $new_name = $n.'.'.$image->getClientOriginalExtension();
      $image->move(public_path("component"),$new_name);
        
      $value=[
          $Componente->nombre,
          $Componente->precio,
          $Componente->descripcion,
          $n.'.'.$image->getClientOriginalExtension()
      ];
      if(DB::statement('RegistrarComponente ?,?,?,?',$value)){
      	return redirect()->route('Componente.index');
      }
      
      }




      	
    public function nuevo(){

      return view ('Componentes.nuevo');  
    }
     public function index(){
     	$componentes=Componente::all();
      return view ('Componentes.listado')->with('componentes',$componentes);  
    }
    public function destroy($componenteID){
    	 
    	$deletedRows = Componente::where('componenteID',$componenteID)->delete();
      return view ('Componentes.listado');  
    }
}
