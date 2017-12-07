<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = "domicilios";
    protected $primaryKey = "id";
    protected $fillable = ["estados_id","municipios_id","colonia","cp","int","ext","calle"];
    public $timestamps = false;

    public function contribuyentes() {
        return $this->belongsToMany('App\Contribuyente',"direcciones","domicilios_id","contribuyentes_id");
    }
    
    public function bienes() {
        return $this->hasMany("App\Bien", "numero_control","id");
    }

    public function estado() {
        return $this->belongsTo('App\estado','estados_id');
    }
}