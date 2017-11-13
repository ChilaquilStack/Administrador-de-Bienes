<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria_bien extends Model
{
    protected $table = "subcategorias";
    protected $primaryKey = "id";
    protected $fillable = ['id','descripcion'];
    public $timestamps = false;
}
