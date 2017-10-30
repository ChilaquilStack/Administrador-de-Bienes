<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_bien extends Model
{
    protected $primaryKey = "id";
    protected $table = "categorias";


    public function articulos() {
        return $this->belongsToMany("articulos_categorias","categorias_id", "categoria_id");
    }
}
