<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perito extends Model
{
    protected $datatable = "peritos";
    protected $primaryKey = "id";
    

    public function bienes() {
        return $this->belongsToMany("App\Bien","valuaciones", "peritos_id","bienes_numero_control");
    }
}
