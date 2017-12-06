<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postor extends Model {

    protected $primaryKey = "RFC";
    protected $table = "postores";
    protected $fillable = ["nombre", "apellido_paterno", "apellido_materno", "correo", "password", "domicilios_id"];
    public $timestamps = false;

    public function remates() {
        return $this->belongsTo("App\Remate", "pujas", "postores_RFC", "remates_id");
    }
}