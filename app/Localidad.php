<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table='Localidades';
    protected $primaryKey='id_localidad';
    public $timestamps=false;

    protected $fillable=['nombre_prov','id_provincia'];
}
