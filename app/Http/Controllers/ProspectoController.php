<?php

namespace App\Http\Controllers;
use App\Prospecto;
use Illuminate\Http\Request;
use DB;
class ProspectoController extends Controller
{
    public function create(){
      
    }
    public function index(){
      $prospectos=DB::table('Prospecto')->where('rechazado', 0)->get();

      
      return view('usuario.prospecto')->with('prospectos',$prospectos);
    }
    public function show(){
      
    }

    public function store( ){
      
    }

    public function nuevo(){

    }
    public function aceptar( $Correo){
      $values=[$Correo];
      DB::statement('AceptarUsuario  ?',  $values);
      return redirect()->route('prospecto.index');

    }
    public function rechazar( $Correo){
        $values=[$Correo];
        DB::statement('RechazaUsuario  ?',  $values);
        return redirect()->route('prospecto.index');
    }
    public function destroy( $Correo){
    
    }
}
