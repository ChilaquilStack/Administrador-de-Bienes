<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    protected $table = "imagenes";
    protected $primaryKey="id";
    protected $fillable = ["nombre"];
    public $timestamps = false;
}
