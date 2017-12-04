<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $datatable="usuarios";
    public $timestamps = false;

    protected $fillable = ['email', 'password', 'apellido_paterno', 'apellido_materno','nombre'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){
        return $this->belongsTo("App\Rol", "rols_id");
    }

    public static function activos(){
        return static::where("estado", 1)->orderBy("id","asc")->get();
    }
}
