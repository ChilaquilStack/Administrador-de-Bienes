<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perito extends Model
{
    protected $datatable = "peritos";
    protected $primaryKey = "id";
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno"];
    public $timestamps = false;

    public function bienes() {
        return $this->belongsToMany("App\Bien","valuaciones", "peritos_id","bienes_numero_control");
    }
}
