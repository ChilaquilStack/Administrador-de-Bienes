<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_bien extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["descripcion"];
    protected $table = "categorias";
    public $timestamps = false;


    public function articulos() {
        return $this->belongsToMany("articulos_categorias","categorias_id", "articulos_id");
    }

    public function subcategorias() {
        return $this->belongsToMany("categorias_subcategorias","categorias_id", "subcategoria_id");
    }

}
