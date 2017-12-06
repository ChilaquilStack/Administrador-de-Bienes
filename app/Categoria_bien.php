<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_bien extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["nombre"];
    protected $table = "categorias";
    public $timestamps = false;


    public function bienes() {
        return $this->belongsToMany("App\Articulo", "articulos_categorias","categorias_id", "bienes_numero_control");
    }

    public function subcategorias() {
        return $this->belongsToMany("App\Subcategoria_bien", "categorias_subcategorias","categorias_id", "subcategorias_id");
    }

}
