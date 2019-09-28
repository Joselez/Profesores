<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use DB;
class matguardarcontroller extends Controller
{
    public function agregarmateria(){
        $id='';
        if($_GET){
        $id =$_GET['id'] ;
        
        }
        $carreras = DB::table("carreras")->where('id_carrera',$id)->get();
        
        return view('agregarmateria')->with('carreras',$carreras);
    }
}