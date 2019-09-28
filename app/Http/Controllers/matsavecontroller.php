<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;

use DB;
class matsavecontroller extends Controller
{
    public function guardar(request $request){
        $comp =   request('guardar');
        $materia = new materia();
        

        $materia->nombre_mat = request('nombre');
        $materia->año_mat = request('año');
        $materia->id_carrera_mat = request('idcarrera');
        $materia->carga_horaria_mat = request('cargahoraria');
        $materia->id_tipo_mat = request('tipo');
        
        $materia->save();

        
        if($comp == "0"){
            return redirect('/materiasguardar?id='.$materia->id_carrera_mat);
        }else
        return redirect('/carreras');
    }
}