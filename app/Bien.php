<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = "bienes";
    protected $primaryKey = "numero_control";
    protected $fillable = ["numero_control","depositarios_id", "deposito_id"];
    public $timestamps = false;

    public function creditos() {
        return $this->belongsToMany('App\Credito','embargos','bienes_numero_control','creditos_fiscales_folio');
    }

    public function deposito() {
        return $this->belongsTo("App\Domicilio","deposito_Id");
    }

    public function depositario() {
        return $this->belongsTo("App\Depositario","depositarios_id");
    }

    public function articulos() {
        return $this->hasMany("App\Articulo","bienes_numero_control","numero_control");
    }

}