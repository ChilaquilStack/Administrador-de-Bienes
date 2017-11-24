<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subsubcategoria extends Model
{
    protected $table = "subsubcategorias";
    protected $primaryKey = "id";
    protected $fillable = ['id','nombre'];
    public $timestamps = false;
}
