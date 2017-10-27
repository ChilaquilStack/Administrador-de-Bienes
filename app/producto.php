<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id";
    protected $fillable = ["id", "descripcion", "estado","bienes_numero_control"];

}