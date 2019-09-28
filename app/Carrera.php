<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table='Carreras';
    protected $primaryKey='id_carrera';
    protected $timestamps=false;

    protected $fillable=['nombre_car','decreto_car','id_profesor_car','resolucion_car'];
}
