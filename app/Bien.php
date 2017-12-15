<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repositorios\Usuario;

class Bien extends Model {

    protected $table = "bienes";
    protected $primaryKey = "numero_control";
    protected $fillable = ["numero_control","depositarios_id", "depositos_id", "descripcion", "cantidad"];
    public $timestamps = false;
    public $incrementing = false;
    private $subcategorias;

    public function creditos() {
        return $this->belongsToMany('App\Credito','embargos','bienes_numero_control','creditos_fiscales_folio')
                    ->withPivot('documento');
    }

    public function deposito() {
        return $this->belongsTo("App\Domicilio","depositos_id");
    }

    public function depositario() {
        return $this->belongsTo("App\Depositario","depositarios_id");
    }

    public function imagenes() {
        return $this->hasMany("App\Imagen","bienes_numero_control","numero_control");
    }

    public function valuaciones() {
        return $this->belongsToMany("App\Perito","valuaciones","bienes_numero_control","peritos_id")
                    ->orderBy("fecha", "des")
                    ->withPivot("monto","fecha", "numero_dictamen");
    }

    public function remates() {
        return $this->belongsToMany("App\Remate","lotes","bienes_numero_control","remate_id");
    }

    public static function activos(){
        return static::where("estado", 1)->get();
    }

    public function categorias() {
        return $this->belongsToMany("App\Categoria_bien","bienes_categorias","bienes_numero_control","categorias_id");
    }

}