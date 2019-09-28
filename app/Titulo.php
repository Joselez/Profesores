<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model{
	
    protected $table='Titulos';
    protected $primaryKey='id_titulo';
    public $timestamps=false;

    protected $fillable=['id_titulo','nombre_tit','expedido_por_tit','id_profesor_tit'];
}
