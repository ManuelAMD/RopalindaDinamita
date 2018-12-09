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



    public function results(Request $request){
      $productos=Prenda::name($request->nombre)->
            orderBy('nombre','DESC')->paginate->();
      return view ('Prenda.menuBusqueda');  
    }



     public function show(){

      return view ('Prenda.menuBusqueda');  //cambiar
    }



    public function destroy($id){
      
      $prenda=prenda::find($id);
      $prenda->delete();
      return redirect()->route('Prenda.index');
        
     }
    public function edit($id){
      $prenda=prenda::find($id);
      return view ('Prenda.edit')->with('prenda',$prenda);      
    }

    public function update(Request $request,$id){
    
      $prenda=prenda::find($id);

      $prenda->nombre=$request->nombre;
      $prenda->precio=$request->precio;
      $prenda->descripcion=$request->descripcion;
      $prenda->categoria=$request->categoria;
      $prenda->imagenID=$request->imagenID;
      $prenda->temporada=$request->temporada;      
     
     
      return redirect()->route('Prenda.index');
    }


    public function subeImagen (Request $request ){
        $this->validate($request,[
            'select_file'=>
                'required|image|mimes:jepg,png,jpg,gif|max:2048'
        ]);
        $image=$request->file('select_file');
        $new_name = rand(). '.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        return back()->with('success','Imagen almacenasa exitosamente')->with ('path',$new_name);
    }


    public function store(Request $request){
       
      $hasFile=$request->hasFile('imagenID') && $request->imagenID->isValid();
      $prenda=new Prenda($request->all()); 
      $value=[$prenda->nombre,$prenda->precio,$prenda->descripcion,$prenda->categoria,$prenda->imagenID,$prenda->temporada];
      dd($value);
     $this->subeImagen($request) ;
      
         //DB::statement('RegistroPrenda ?,?,?,?,?,?',$value) );
          
      }

    public function index(){
      $prendas=prenda::orderBy('id','ASC')->paginate(10); 
      return view('Prenda.listado')->with('prendas',$prendas); 
     }

    
}
