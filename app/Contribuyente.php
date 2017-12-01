<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    protected $table = "contribuyentes";
    protected $primaryKey = "id"; //CURP ó RFC
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno", "telefono", "rfc","id", "razon_social"];
    public $timestamps = false;
    public $incrementing = false;    

    public function creditos() {
        return $this->hasMany('App\Credito',"contribuyentes_id");
    }

    public function domicilios() {
        return $this->belongsToMany("App\Domicilio","direcciones_contribuyentes","contribuyentes_id","domicilios_id");
    }

    public static function activos(){
        return static::where("estatus", 1)->orderBy("folio","asc")->get();
    }
}