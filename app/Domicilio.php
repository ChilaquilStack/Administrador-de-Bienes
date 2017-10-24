<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = "Domicilios";
    protected $primaryKey = "id";
    protected $fillable = ["estados_id","municipios_id","colonias_id","cp","int","ext","calle"];
    public $timestamps = false;

    public function contribuyentes() {
        return $this->belongsToMany('App\Contribuyente',"direcciones","domicilios_id","contribuyentes_id");
    }
}
