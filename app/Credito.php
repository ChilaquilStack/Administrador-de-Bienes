<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table = "creditos_fiscales";
    protected $primaryKey = "folio";
    protected $fillable = ["folio","monto", "documento_determinante","origen_credito","contribuyentes_id"];
    public $timestamps = false;

    public function contribuyente()
    {
        return $this->belongsTo('App\Credito');
    }
}