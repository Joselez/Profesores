<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProfesorRequest;
use App\Profesor;
use App\Provincia;
use App\Localidad;
use App\Estado;
use App\Titulo;
use DB;

class ProfesorController extends Controller{
    
    public function index(Request $request){

        $input = $request->all();
        $estados = new Estado();
        $provincias = new Provincia();
        $localidades = new Localidad();
        $titulos = new Titulo();


        $estados = $estados->all();
        $provincias = $provincias->all();

        if($request->get('buscar')){
            $profesores = DB::table('profesores')
            ->join('localidades','localidades.id_localidad','=','profesores.id_localidad_pro')
            ->join('estados','estados.id_estado','=','profesores.id_estado_pro')
            ->where('dni_pro', 'LIKE', "{$request->get('buscar')}%")
            ->orderBy('id_profesor','ASC')
            ->paginate(5);
        }else{
            $profesores = DB::table('profesores')
            ->join('localidades','localidades.id_localidad','=','profesores.id_localidad_pro')
            ->join('estados','estados.id_estado','=','profesores.id_estado_pro')
            ->orderBy('id_profesor','ASC')
            ->paginate(6);
        }

        return view('profesor',['profesores'=> $profesores,'estados'=>$estados, 'provincias' =>$provincias, 'localidades'=>$localidades,]);
    }

    public function autocompletar(Request $request){

        $buscar = $request->get('terms');
        $res=[];

        
        $result=Localidad::where('nombre_loc', 'LIKE', '%'.$buscar.'%')->get();

        foreach($result as $fila)
        {
            $res[]=[
                "id"=>$fila->id_localidad,
                "name"=>$fila->nombre_loc
            ];
        }
        
        
        echo json_encode($res);
    }


    public function create(Request $request){

        $estados = new Estado();
        $provincias = new Provincia();
        $provincias = $provincias->all();
        $estados = $estados->all();

        return view('crearprofesor',['estados'=>$estados,'provincias' =>$provincias]);
    }

    public function store(ProfesorRequest $request){

        $profesor = new Profesor();

        $profesor->legajo_pro = $request->input('legajo_pro');
        $profesor->nroderegistro_pro = $request->input('nroderegistro_pro');
        $profesor->dni_pro = $request->input('dni_pro');
        $profesor->nombre_pro = $request->input('nombre');
        $profesor->apellido_pro = $request->input('apellido');
        $profesor->nacimiento_pro = $request->input('nacimiento');
        $profesor->id_localidad_pro = $request->input('idloc');
        $profesor->direccion_pro = $request->input('direccion');
        $profesor->telefono_pro = $request->input('telefono');
        $profesor->celular_pro = $request->input('celular');
        $profesor->correo_pro = $request->input('correo_pro');
        $profesor->observaciones_pro = $request->observacion;
        $profesor->id_estado_pro = $request->estado;

        
        $profesor->save();
        //$profesor = Profesor::create($request->all());
        $titulos = new Titulo();
        $id_profesor = $profesor->id_profesor;
        

        foreach($_POST['usuario'] as $key =>$values) {

            $dato= $values['dato'];
            $dato2= $values['exp'];

            $titulos->insert(['nombre_tit' => $dato, 'expedido_por_tit'=> $dato2, 'id_profesor_tit' => $id_profesor]);
        }

        return redirect()->route('crearprofesor');
    }

    public function show($id){

        //
    }

    public function edit($id){
        
        $estados = new Estado();
        $provincias = new Provincia();
        $provincias = $provincias->all();
        $estados = $estados->all();

        $datos = Profesor::join('localidades','localidades.id_localidad','=','profesores.id_localidad_pro')->find($id);
        
        $selectestado = $datos->id_estado_pro;

        $titulo = new Titulo();
        $localidades= new Localidad();

        $titulos= $titulo->where('id_profesor_tit', '=', $id)->first()->get();
        /* ->leftJoin('titulos', 'titulos.id_profesor_tit', '=', 'profesores.id_profesor')*/
       

        return view('editarprofesor',['estados'=>$estados,'provincias' =>$provincias,'datos'=>$datos, 'titulos'=>$titulos, 'selectestado'=>$selectestado]);   
    }


    public function update(Request $request){

        $profesor= Profesor::find($request->input('id_prof'));

        $profesor->legajo_pro = $request->input('legajo_pro');
        $profesor->nroderegistro_pro = $request->input('nroderegistro_pro');
        $profesor->dni_pro = $request->input('dni_pro');
        $profesor->nombre_pro = $request->input('nombre');
        $profesor->apellido_pro = $request->input('apellido');
        $profesor->nacimiento_pro = $request->input('nacimiento');
        $profesor->id_localidad_pro = $request->input('localidad');
        $profesor->direccion_pro = $request->input('direccion');
        $profesor->telefono_pro = $request->input('telefono');
        $profesor->celular_pro = $request->input('celular');
        $profesor->correo_pro = $request->input('correo_pro');
        $profesor->observaciones_pro = $request->observacion;
        $profesor->id_estado_pro = $request->estado;

         $profesor->save();
       
        $titulos = Titulo::find($request->id_tit);

        $titulos->nombre_tit = $request->input('titulo');
        $titulos->expedido_por_tit = $request->input('expedido');
        
        $titulos->save();

        return redirect()->route('profesor')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id){
        
        //
    }
}
