<script type="text/javascript">
    $(function (){
    var actual_fs,next_fs,prev_fs;
    
    $('.next').click(function(){
        actual_fs =$(this).parent();
        next_fs=$(this).parent().next();
        
        
        $('#progreso li').eq($('fieldset').index(next_fs)).addClass('activo')
        actual_fs.hide(800);
        next_fs.show(800);
        
    });

       $('.prev').click(function(){
        actual_fs =$(this).parent();
        prev_fs=$(this).parent().prev();
        
        
        $('#progreso li').eq($('fieldset').index(actual_fs)).removeClass('activo')
        actual_fs.hide(800);
        prev_fs.show(800);
        
    });
    
    
    $('#formulario input[type=submit]').click(function(){
      return false;  
    });
    
});
</script>




<form id="formulario" >
    <ul id="progreso">
        <li class=" text-center activo"></li>
        <li class=" text-center la"></li>
        <li class="text-center la"></li>
    </ul>
       
       
    <fieldset class="col-12">
          
        <div class="form-row">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <a>{{ $error }}</a>
                        @endforeach
                    </ul>
                </div>
            @endif
             
            <div class="col-md-3 mb-3">
                <label for="validationCustom01">DNI</label>
                <input type="text" class="form-control" id="dni_pro" name="dni_pro" placeholder="Ingresar DNI" value="" >
                <div class="invalid-feedback">
                    Porfavor ingresar dni
                </div>
            </div>
   
            <div class="col-md-3 mb-3">
                <label for="validationCustom01">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre" value="" >
                <div class="invalid-feedback">
                    Porfavor ingresar Nombre
                </div>
            </div>
        
            <div class="col-md-3 mb-3">
                <label for="validationCustom02">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="" >
                <div class="invalid-feedback">
                    Porfavor ingresar Apellido
                </div>
            </div>
      
            <div class="col-md-3 mb-3">
                <label for="validationCu">Fecha de Nacimiento</label>
                 <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Fecha de Nacimiento" value="" >
                <div class="invalid-feedback">
                    Porfavor ingresar Apellido
                </div>
            </div>
        </div>
  
        <!-------------------------------------------------------->
  
  
        <div class="form-row">

            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                <div class="invalid-feedback">
                    Porfavor ingresar Dirección
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono Fijo">
                <div class="invalid-feedback">
                    Porfavor ingresar Teléfono
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">      
                <div class="invalid-feedback">
                    Porfavor ingresar Celular
                </div>
            </div>
        </div>
       
        <!-------------------------------------------------------->
    
        <div class="form-row">
         
            <div class="col-md-3">
                <label for="val">Provincia</label>
                <select id="provincia" name="provincia" class="custom-select " >
                    <option value="">Seleccionar Provincia</option>
                    @foreach($provincias as $provincia)
                        <option value="{{$provincia->id_provincia}}">{{$provincia->nombre_prov}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Ingresar Provincia
                </div>
            </div>
         
            <div class="col-md-3">
                <label for="val1">Localidad</label>
                 <input type="hidden" class="form-control" name="idloc" id="idloc">
                <input type="text" class="form-control" name="localidad" id="localidad">
                <div class="invalid-feedback">
                    Ingresar Localidad 
                </div>
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

            <div class="col-md-6 mb-3">
                <label for="validationCustomUsername">Correo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="input">@</span>
                </div>
                    <input type="email" class="form-control" id="correo_pro" name="correo_pro" placeholder="Correo" aria-describedby="input">
                    <div class="invalid-feedback">
                        Porfavor ingresar Correo
                    </div>
                </div>
            </div>
        </div>
          
        <button type="button"  class="next btn btn-info" name="next">Siguiente</button>
    </fieldset>
       
    <fieldset class="col-12">
        <div class="form-row">
            <br>
            <div class="col-md-3 mb-3">
                <label for="11">Número de Legajo</label>
                <input type="text" class="form-control" id="legajo_pro" name="legajo_pro" placeholder="Número de Legajo" value="" >
                <div class="invalid-feedback">
                    Por favor ingresar Número de Legajo
                </div>
            </div>
      
      
            <div class="col-md-3 mb-3">
                <label for="12">Número de Regitro</label>
                <input type="text" class="form-control" id="nroderegistro_pro" name="nroderegistro_pro" value="" placeholder="Número de Registro">
                <div class="invalid-feedback">
                    Por favor ingresar Número de Regitro
                </div>
            </div>
    
    
            <div class="col-md-6 mb-3">
                <label for="13">Estado</label>
                <select id="estado" name="estado" class="custom-select " >
                    <option value="">Seleccionar Estado</option>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id_estado}}">{{$estado->descripcion_est}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Ingresar estado 
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="12">Observaciones</label>
                <textarea type="text" class="form-control" id="observacion" name="observacion" value="" placeholder="Observaciones" value=""></textarea>
            </div>
            
        </div>
    
    
     
        
        
        <button type="button"  class="prev btn btn-danger" name="prev">Anterior</button>

        <button type="button"  class="next btn btn-info" name="next">Siguiente</button>
    </fieldset>
       
    <fieldset>

        <div class="form-row">
            
            <div class="col-md-6 mb-3">
                <label for="16">Título</label>
                <div id="inputs">
                Titulo:<input id="dato" type="text" name="usuario[0][dato]" />
                Expedido por:<input id="exp" type="text" name="usuario[0][exp]" />

                <input id="agrega" type="button" value="+" />
            </div>

            <script>
                $(document).ready(function(){
                    var cuentaInputs = $('#vida').children().length;
                    $('#agrega').click(function(){
                        cuentaInputs++;
                        $('<br class="fila'+cuentaInputs+'"/><label class="fila'+cuentaInputs+'">Titulo.'+cuentaInputs+':</label><input type="text" name="usuario['+cuentaInputs+'][dato]" class="fila'+cuentaInputs+'" id="dato'+cuentaInputs+'"/><label class="fila'+cuentaInputs+'">Expedido por.'+cuentaInputs+':</label><input type="text" name="usuario['+cuentaInputs+'][exp]" class="fila'+cuentaInputs+'" id="exp'+cuentaInputs+'"/>').appendTo('#inputs');
                    });
                });
            </script>
                <div class="invalid-feedback">
                    Por favor ingresar Número de Legajo
                </div>
            </div>
        </div>

        <button type="button" class="prev btn btn-danger" name="prev">Anterior</button>

        <button type="submit" class="submit btn btn-info" name="submit">Enviar</button>
    </fieldset>
</form>


