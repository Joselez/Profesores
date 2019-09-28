<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='Estados';
    protected $primaryKey='id_estado';
   	public $timestamps=false;

    protected $fillable=['id_estado','descripcion_est'];
}
