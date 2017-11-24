<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "Estados";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function domicilios(){
        return $this->hasMany('App\Domicilio','estados_id','id');
    }

    public function municipios() {
        return $this->hasMany("App\Municipio", "estados_id");
    }
}