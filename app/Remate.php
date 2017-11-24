<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remate extends Model {

    protected $primaryKey = "id";
    protected $table = "remates";
    protected $fillable = ["fecha_inicio", "fecha_fin"];
    public $timestamps = false;

    public function articulos() {
        return $this->belongsToMany("App\Articulo", "lotes","remate_id", "articulos_id");
    }
    
    public function postores() {
        return $this->belongsToMany("App\Postor","pujas","remates_id","postores_RFC");
    }

    public static function activos() {
        return static::where("estado", 1)->get();
    }

}