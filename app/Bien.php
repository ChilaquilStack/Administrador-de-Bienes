<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = "bienes";
    protected $primaryKey = "numero_control";
    protected $fillable = ["numero_control","cantidad", "fecha_alta","estado","comentarios"];
    public $timestamps = false;

    public function creditos()
    {
        return $this->belongsToMany('App\Credito','embargos','bienes_numero_control','creditos_fiscales_folio');
    }
}
