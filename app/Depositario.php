<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depositario extends Model
{
    protected $table = "depositarios";
    protected $primaryKey = "id";
    protected $fillable = ["nombre","apellido_paterno","apellido_materno"];
    public $timestamps = false;    

    public function bienes() {
        return $this->hasMany("App\Bien");
    }
}