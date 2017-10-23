<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model {
    
    protected $table = "contribuyentes";
    protected $primaryKey = "id";
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno", "telefono", "rfc","curp"];

    public function creditos() {
        return $this->hasMany('App\Credito');
    }

    public function domicilios() {
        return $this->belongsToMany('App\Domicilio',"id");
    }

}