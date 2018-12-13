<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use App\prenda;
use App\componente;
use DB;

class prendaController extends Controller
{
    public function create(){

      return view ('Prenda.nuevo');  
    }


    public function search(){
        return view ('Prenda.busqueda'); 
      
    }
     public function AsignarComponentePrenda(Request $request ){
      $p=$request->all();
      unset($p['_method']);
      unset($p['_token']);
      $keys = array_keys($p);
      $array=array();
      $array2=array();
      $i=0;
      foreach ($p as $d) {
        if (  (substr($keys[$i], 0, 1))=='C') {
                $array2[]=$d;
                
        }  
        if (  (substr($keys[$i], 0, 1))=='P') {
                $array[]=$d;
                
        }      
        $i++;;  
      }






      foreach ($array as $prenda) {
        foreach ($array2 as $componente) {
            $values=[$prenda,$componente];
              DB::statement('AsignarPrendasComponentes ?,?',$values);
        }
      }
     return redirect()->route('Prenda.asignar');
      
      
    }
    

    public function asignar(){
          $prendas=prenda::all();
          $componentes=Componente::all();
          return view ('Prenda.asignacionPC')->with('componentes',$componentes)->with('prendas',$prendas); 
    }



    public function results(Request $request){
      // $productos=Prenda::name($request->nombre)->
      //orderBy('nombre','DESC')->paginate->();

      return view ('Prenda.menuBusqueda');  
    }



     public function show(){

      return view ('Prenda.menuBusqueda');  //cambiar
    }



    public function destroy($prendaID){
      

        
        $deletedRows = prenda::where('prendaID',$prendaID)->delete();
        return redirect()->route('Prenda.index');
          
       }
      public function edit($prendaID){
        $prenda=prenda::where('prendaID',$prendaID)->first();
        return view ('Prenda.edit')->with('prenda',$prenda);      
      }
  
      public function update(Request $request,$prendaID){
        
    }

 

    public function store(Request $request){//ya esta
       
      $prenda=new Prenda();
      $prenda->FinalizarRegistroPrenda($request);
      return redirect()->route('Prenda.index');
      }


    public function index(){//no mod solo paginar
      $prendas=prenda::all(); 
       
      return view('Prenda.listado')->with('prendas',$prendas); 
     }

      

    
}
