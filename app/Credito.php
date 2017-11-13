<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Credito extends Model {
    protected $table = "creditos_fiscales";
    protected $primaryKey = "folio";
    protected $fillable = ["folio","monto", "documento_determinante","origen_credito","contribuyentes_id"];
    public $timestamps = false;
    public $incrementing = false;

    public function contribuyente() {
        return $this->belongsTo('App\Contribuyente','contribuyentes_id');
    }
    
    public function bienes() {
        return $this->belongsToMany('App\Bien','embargos','creditos_fiscales_folio','bienes_numero_control');
    }

   
}