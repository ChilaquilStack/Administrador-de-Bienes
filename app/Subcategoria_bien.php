<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria_bien extends Model {
    protected $table = "subcategorias";
    protected $primaryKey = "id";
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function subsubcategorias() {
        return $this->belongsToMany("App\subsubcategoria", "subcategorias_subsubcategorias", "subcategorias_id", "subsubcategorias_id");
    }

    public function categorias() {
        return $this->belongsToMany("App\Categoria_bien", "categorias_subcategorias", "subcategorias_id", "categorias_id");        
    }
}

