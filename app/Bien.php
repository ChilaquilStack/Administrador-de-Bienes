<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = "bienes";
    protected $primaryKey = "numero_control";
    protected $fillable = ["numero_control","fecha_alta"];
    public $timestamps = false;

    public function creditos() {
        return $this->belongsToMany('App\Credito','embargos','bienes_numero_control','creditos_fiscales_folio');
    }

    public function deposito() {
        return $this->belongsTo("App\Domicilio");
    }

    public function depositario() {
        return $this->belongsTo("App\Depositario");
    }

    public function articulos() {
        return $this->hasMany("App\Articulo");
    }

}