<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipios";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function Estado() {
        return $this->belongsTo("App\Estado", "estados_id");
    }
}
