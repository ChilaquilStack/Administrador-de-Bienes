<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribuyente_fisico extends Model
{
    protected $table = "contribuyentes_fisicos";
    protected $primaryKey = "id"; //CURP
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno", "telefono", "rfc","id"];
    public $timestamps = false;
    public $incrementing = false;    

    public function creditos() {
        return $this->hasMany('App\Credito',"contribuyentes_fisicos_id");
    }

    public function domicilios() {
        return $this->belongsToMany("App\Domicilio","direcciones_contribuyentes_fisicos","contribuyentes_fisicos_id","domicilios_id");
    }
}
