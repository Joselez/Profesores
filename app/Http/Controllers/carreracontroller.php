<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Turnos;
use App\Estados;
use DB;
class carreracontroller extends Controller
{
    public function mostrarcarrera(){
        $nombre='';
        if($_GET){
        $nombre =$_GET['inpCar'] ;
        }
        $carreras = DB::table("carreras")->leftjoin('turnos', 'carreras.id_turno_car', '=', 'turnos.id_turno')->leftjoin('estados_carreras', 'carreras.id_estado_car', '=', 'estados_carreras.id_estado')->where('nombre_car','like','%'.$nombre.'%')->leftjoin('directores_carreras','id_carrera_dir_car', '=', 'id_carrera')->leftjoin( 'profesores', 'id_profesor_dir_car', '=', 'id_profesor')->paginate(6);
        $turnos = Turnos::all();
        $estados = Estados::all();
        return view('carreras')->with('carreras',$carreras)->with('turnos',$turnos)->with('estados',$estados);
    }
}
