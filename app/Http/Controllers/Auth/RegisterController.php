<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Controller;

class RegisterController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function create(UsersRequest $request) {
        User::create([
            'nombre' => $request['nombre'],
            'apellido_paterno' => $request['apellido_paterno'],
            'apellido_materno' => $request['apellido_materno'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'rols_id' => 2
        ]);
        return redirect("/");
    }
    
    public function register() {
        return view("auth.register");
    }
}
