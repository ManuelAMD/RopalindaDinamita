<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use App\Producto;

class ProductController extends Controller
{
    public function create(){

      return view ('Productos.nuevo');  
    }
    public function destroy($id){
      
      $Producto=Producto::find($id);
      $Producto->delete();
      return redirect()->route('productos.index');
        
     }
    public function edit($id){
      $Producto=Producto::find($id);
      return view ('productos.edit')->with('producto',$Producto);      
    }

    public function update(Request $request,$id){
    
      $Producto=Producto::find($id);
      $Producto->name=$request->name;
      $Producto->description=$request->description;
      $Producto->cuantity=$request->cuantity;
      $Producto->color=$request->color;
      $Producto->price=$request->price;
      $Producto->image=$request->image;
      $Producto->talla=$request->talla;
      $Producto->season=$request->season;
      $Producto->available=$request->available;
      $Producto->category=$request->category;
      $Producto->save();
     
      return redirect()->route('productos.index');
    }



    public function store(Request $request){
      //dd($request);

      $Producto=new Producto($request->all());  
      $imageName = $Producto->name;
      $request->file('image')->move(base_path() . 'public/img/a', $imageName);
      $Producto->save();
      
      return redirect()->route('productos.index');  
    }
    public function index(){
      $productos=Producto::orderBy('id','ASC')->paginate(10); 
      return view('productos.listado')->with('productos',$productos); 
     }

    
}
