<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model {
    
    protected $table = "contribuyentes";
    protected $primaryKey = "id";
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno", "telefono", "rfc","curp"];
    public $timestamps = false;

    public function creditos() {
        return $this->hasMany('App\Credito',"contribuyentes_id");
    }

    public function domicilios() {
        return $this->belongsToMany('App\Domicilio',"direcciones","contribuyentes_id","domicilios_id");
    }

}