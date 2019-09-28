<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use DB;
class coordinadorcontroller extends Controller
{
    public function buscar(request $request){
       /* $nombre='';
        if($_GET){
        $nombre =$_GET['dato'] ;
        }
        $carreras = DB::table("carreras")->leftjoin('turnos', 'carreras.id_turno_car', '=', 'turnos.id_turno')->leftjoin('estados_carreras', 'carreras.id_estado_car', '=', 'estados_carreras.id_estado')->where('nombre_car','like','%'.$nombre.'%')->paginate(6);
        return $carreras[0];*/

    $textoingresado = $_GET["terms"]; 

    // Armo respuesta en un vector
    $res = [];

    $resultado =   DB::table("profesores")->where('apellido_pro','like','%'.$textoingresado.'%')->get();
    
    foreach ( $resultado as $fila ) {
        //dd($fila);
        $res[] = [
            'id' => $fila->id_profesor,
            'name' => $fila->apellido_pro." ".$fila->nombre_pro
        ];

    }

      
    header('Content-type: application/json');
    echo json_encode($res);

    }
}