<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perito extends Model
{
    protected $datatable = "peritos";
    protected $primaryKey = "Id";
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno"];
    public $timestamps = false;

    public function articulos() {
        return $this->belongsToMany("App\articulo","valuaciones", "peritos_id","articulos_id");
    }
}
