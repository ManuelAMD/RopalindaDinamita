<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use App\prenda;
use DB;

class prendaController extends Controller
{
    public function create(){

      return view ('Prenda.nuevo');  
    }



    public function search(){
        return view ('Prenda.busqueda'); 
      
    }

    public function personalize(){
          return view ('Prenda.prendasper'); 
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
    
        $prenda=prenda::where('prendaID',$prendaID)->first();

        
        $deletedRows = prenda::where('prendaID',$prendaID)->delete();
        return redirect()->route('Prenda.index');
          
       }
      public function edit($prendaID){
        $prenda=prenda::where('prendaID',$prendaID)->first();
        return view ('Prenda.edit')->with('prenda',$prenda);      
      }
  
      public function update(Request $request,$prendaID){
         /* 
        $prenda=prenda::where('prendaID',$prendaID)->first();
        dd($prenda);
        if($request->imagen==null){
           
        }else 
        {
        $image=$request->file('imagen');
        $this->validate($request,[
             'imagen'=>
                'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]); 
        $n=rand();
        $new_name = $n.'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);



        $prenda->imagen= $new_name = $n.'.'.$image->getClientOriginalExtension();;
        }

        $prenda->nombre=$request->nombre;
        $prenda->precio=$request->precio;
        $prenda->descripcion=$request->descripcion;
        $prenda->temporada=$request->temporada;
        $prenda->categoria=$request->categoria;      
        $prenda->save();
        return redirect()->route('Prenda.index');*/
    }

 

    public function store(Request $request){//ya esta
       
     //dd($request->imagenID);
      $prenda=new Prenda($request->all()); 
       
      $image=$request->file('imagen');
      $this->validate($request,[
           'imagen'=>
              'required|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]); 
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
      return redirect()->route('Prenda.index');
      }


    public function index(){//no mod solo paginar
      $prendas=prenda::all(); 
       
      return view('Prenda.listado')->with('prendas',$prendas); 
     }

      

    
}
