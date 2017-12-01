<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Credito extends Model {
    protected $table = "creditos_fiscales";
    protected $primaryKey = "folio";
    protected $fillable = ["folio","monto", "documento_determinante","origen_credito","contribuyentes_fisicos_id", "contribuyentes_morales_id"];
    public $timestamps = false;
    public $incrementing = false;

    public function contribuyentes_fisicos() {
        return $this->belongsTo('App\Contribuyente_fisico','contribuyentes_fisicos_id');
    }
    
    public function contribuyentes_morales() {
        return $this->belongsTo('App\Contribuyente_moral','contribuyentes_morales_id');
    }

    public function bienes() {
        return $this->belongsToMany('App\Bien','embargos','creditos_fiscales_folio','bienes_numero_control');
    }

    public static function activos(){
        return static::where("estatus", 1)->orderBy("folio","asc")->get();
    }

}