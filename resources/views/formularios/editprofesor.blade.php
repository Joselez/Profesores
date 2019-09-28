<div class="container">
    @csrf
    <input type="hidden" class="form-control" name="id_prof" id="id_prof" value="{{$datos->id_profesor}}">

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <center>
            <h3>
                <b>Modificar un Profesor</b>
            </h3>
        </center>
    </div>

    <div>
        <h6>
            <b>Datos Personales</b>
        </h6>
    </div>
    
    <div class="form-row">
         
        <div class="col-md-2 mb-3">
            <label for="1">DNI</label>
            <input type="text" class="form-control" id="dni_pro" name="dni_pro" placeholder="Ingresar DNI" value="{{$datos->dni_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Dni</div>
        </div>
           
        <div class="col-md-2 mb-3">
            <label for="2">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre" value="{{$datos->nombre_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Nombre</div>
        </div>
            
        <div class="col-md-2 mb-3">
            <label for="3">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{$datos->apellido_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Apellido</div>
        </div>
          
        <div class="col-md-2 mb-3">
            <label for="4">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Fecha de Nacimiento" value="{{$datos->nacimiento_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Fecha de Nacimiento</div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationCustom03">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{$datos->direccion_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Dirección</div>
        </div>
    </div>


  <!-------------------------------------------------------->
  
  
    <div class="form-row">
    
        <div class="col-md-2 mb-3">
            <label for="6">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono Fijo" value="{{$datos->telefono_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Teléfono</div>
        </div>

        <div class="col-md-2 mb-3">
            <label for="7">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="{{$datos->celular_pro}}" required>
            <div class="invalid-feedback">Porfavor ingresar Celular</div>
        </div>



        <div class="col-md-2">
            <label for="8">Provincia</label>
            <select id="provincia" name="provincia" class="custom-select " required>
                @foreach($provincias as $provincia)
                    <option value="{{$provincia->id_provincia}}">{{$provincia->nombre_prov}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Ingresar Provincia</div>
        </div>



        <div class="col-md-2" >
            <label for="9">Localidad</label>
              <input type="hidden" class="form-control" name="idloc" id="idloc" value="{{$datos->id_localidad}}">
            <input type="text" class="form-control" name="localidad" id="localidad" value="{{$datos->nombre_loc}}" required>
            <div class="invalid-feedback">Ingresar Localidad </div>
        </div>

            
            <script type="text/javascript">

                $("#localidad").typeahead(
                {
                    items:15,
                    minLegth:2,
                    
                    source: function(query, process)
                    {
                        return $.get('localidades?terms='+query,{}, 'json').done(function(data)
                        {
                            return process (JSON.parse(data));
                        });
                    },
                    afterSelect: function (item)
                    {
                        $('#idloc').val(item.id);
                        $('#localidad').val(item.name);
                    }
                });
            </script>

        <div class="col-md-4 mb-3">
            <label for="10">Correo</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="input">@</span>
                </div>
                <input type="email" class="form-control" id="correo_pro" name="correo_pro" placeholder="Correo" aria-describedby="input" value="{{$datos->correo_pro}}" required>
                <div class="invalid-feedback">Porfavor ingresar Correo</div>
            </div>
        </div>
    </div>
   
    <!-------------------------------------------------------->
    <br> 
    <div>
        <h6>
            <b>Datos Academicos</b>
        </h6>
    </div>
    
    <!-------------------------------------------------------->

    
    <div class="form-row">

        <br>
        <div class="col-md-2 mb-3">
            <label for="11">Número de Legajo</label>
            <input type="text" class="form-control" id="legajo_pro" name="legajo_pro" placeholder="Número de Legajo" value="{{$datos->legajo_pro}}" >
            <div class="invalid-feedback">Por favor ingresar Número de Legajo</div>
        </div>
          
          
        <div class="col-md-2 mb-3">
            <label for="12">Número de Regitro</label>
            <input type="text" class="form-control" id="nroderegistro_pro" name="nroderegistro_pro" placeholder="Número de Registro" value="{{$datos->nroderegistro_pro}}" required>
            <div class="invalid-feedback">Por favor ingresar Número de Registro</div>
        </div>
        
          
       

        <div class="col-md-2 mb-3">
    	    <label for="13">Estado</label>
    	    <select id="estado" name="estado" class="custom-select " required>
    	        @foreach($estados as $estado)
    	      	    <option value="{{ $estado->id_estado }}" {{ ( $estado->id_estado == $selectestado) ? 'selected' : '' }}> {{$estado->descripcion_est}}</option>
    	     	@endforeach
    	    </select>
        </div>

        
        <input type="hidden" class="form-control" name="id_tit" id="id_tit" value="{{$titulo->id_titulo}}">
      
        <div class="col-md-2 mb-3">
            <label for="16">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{$titulo->nombre_tit}}" required>
            <div class="invalid-feedback">Por favor ingresar Titulo</div>
        </div>
 
        <div class="col-md-4 mb-3">
            <label for="17">Expedido por</label>
            <input type="text" class="form-control" id="expedido" name="expedido" placeholder="Nombre de la Institucion" value="{{$titulo->expedido_por_tit}}" required>
            <div class="invalid-feedback">Por favor ingresar Nombre de la Institucion</div>
        </div>
    </div>
    
    <div class="form-row">
        
        <div class="col-md-12 mb-3">
            <label for="12">Observaciones</label>
            <textarea type="text" class="form-control" id="observacion" name="observacion" placeholder="Observaciones" value="{{$datos->observacion_pro}}"></textarea>
        </div>
    </div>

    <div class="modal-footer col-12">
         <a href="{{route('profesor')}}" type="button" class="btn btn-secondary  mr-sm-2">Cerrar</a>
        <button type="submit" name="BtnEnviar" id="BtnEnviar" class="btn btn-primary">Guardar</button>
    </div>
</div>