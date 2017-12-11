<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subsubcategoria extends Model
{
    protected $table = "subsubcategorias";
    protected $primaryKey = "id";
    protected $fillable = ['id','nombre'];
    public $timestamps = false;

    public function subcategorias() {
        return $this->belongsToMany("App\Subcategoria_bien", "subcategorias_subsubcategorias", "subsubcategorias_id", "subcategorias_id");
    }
}
