<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use DB;
class materiacontroller extends Controller
{
    public function mostrarmateria(){
        $id = $_GET['id'];
        $carreras = DB::table("carreras")->leftjoin('turnos', 'carreras.id_carrera', '=', 'turnos.id_turno')->where('id_carrera','=',$id)->paginate(6);
        $materias = DB::table("materias")->leftjoin('tipos_materias', 'materias.id_materia', '=', 'tipos_materias.id_tipo')->where('id_carrera_mat','=',$id)->get(); 
        return view('materias')->with('materias',$materias)->with('carreras',$carreras);
    }
}
