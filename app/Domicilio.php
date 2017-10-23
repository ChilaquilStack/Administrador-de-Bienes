<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    private $table = "Domicilios";
    private $primaryKey = "id"

    public function contribuyentes(){
        return $this->belongsToMany('App\Contribuyente');
    }
}
