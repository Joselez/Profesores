<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table='Profesores';
    protected $primaryKey='id_profesor';
    public $timestamps=false;

    protected $fillable=['id_profesor','dni_pro','nombre_pro','apellido_pro','nacimiento_pro','id_localidad_pro','direccion_pro','telefono_pro','celular_pro','correo_pro','observaciones_pro','id_estado_pro'];    
}