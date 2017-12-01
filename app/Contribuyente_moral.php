<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribuyente_moral extends Model
{
    protected $table = "contribuyentes_morales";
    protected $primaryKey = "id"; //RFC
    protected $fillable = ["razon_social", "telefono", "id"];
    public $timestamps = false;
    public $incrementing = false;
    
    public function creditos() {
        return $this->hasMany('App\Credito',"contribuyentes_morales_id");
    }

    public function domicilios() {
        return $this->belongsToMany('App\Domicilio',"direcciones_contribuyentes_morales","contribuyentes_morales_id","domicilios_id");
    }
}