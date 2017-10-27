<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public function categorias() {
        return $this->belongsToMany("App\Categoria_bien","bienes_categorias","bienes_numero_control","categorias_id");
    }

    public function imagenes() {
        return $this->hasMany("App\Imagenes");
    }

    public function peritos() {
        return $this->belongsToMany("App\Perito","valuaciones","bienes_numero_control","peritos_id");
    }

    public function articulos() {
        return $this->hasMany("App\Articulos");
    }
}
