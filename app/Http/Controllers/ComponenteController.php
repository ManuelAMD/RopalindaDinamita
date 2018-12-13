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
    	
       
        $componente=new Componente();
        $componente->finalizarRegistroComponente($request);
        return redirect()->route('Componente.index');
    
      
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
