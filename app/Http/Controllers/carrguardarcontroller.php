<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Director;
use DB;
class carrguardarcontroller extends Controller
{
    public function guardar(request $request){
          
        $carrera = new Carrera();
        $director = new Director();

        $carrera->nombre_car = request('nombre');
        $carrera->decreto_car = request('decreto');
        $carrera->resolucion_car = request('resolucion');
        $carrera->plan_car = request('plan');
        $carrera->id_turno_car = request('turno');
        $carrera->id_estado_car = request('estado');
        $carrera->save();

        $director->id_carrera_dir_car = $carrera->id;
        $director->id_profesor_dir_car = request('coordid');
        $director->resolucion_dir_car = 232323;
        $director->save();

        return redirect('/materiasguardar?id='.$carrera->id);
    }
}