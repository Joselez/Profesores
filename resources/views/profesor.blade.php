@extends('layouts.app')

@section('content')

    <div style="width: 100%; "> 
        <center>
          <form style="width:900px; margin-top: 30px;" class="form-inline" action="{{route('profesor')}}">
            <input style="width:300px; " class="form-control mr-sm-2 " type="search" name="buscar" id="buscar" placeholder="Ingresar numero de documento" aria-label="Search">
            <button class="btn btn-outline-info  mr-sm-5" type="submit">Buscar</button>
            
            
            <!-- Button Modal Agregar Profesor -->
            <a href="{{route('crearprofesor')}}" style="margin-left: 90px;"  class="btn btn-info  mr-sm-2">Nuevo Profesor/a</a>
          </form>
        </center>
    </div>
    </br>     
       
    <table class="table table-striped">
       <thead>
            <th>Legajo</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($profesores as $profesor)
                <tr>
                    <td>{{$profesor->legajo_pro}}</td>
                    <td>{{$profesor->dni_pro}}</td>
                    <td>{{$profesor->nombre_pro}}</td>
                    <td>{{$profesor->apellido_pro}}</td>
                    <td>{{$profesor->telefono_pro}}</td>
                    <td>{{$profesor->celular_pro}}</td>
                    <td>{{$profesor->correo_pro}}</td>
                  
                    <td>
                        <!--<button class="btn btn-danger" data-proid="{{$profesor->id_profesor}}" data-toggle="modal" data-target="#eliminar">Eliminar
                        </button>-->
                        <a class="btn btn-secondary" href="{{route('editprof', $profesor->id_profesor)}}" method="GET">Modificar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $profesores->render() !!}
@endsection