<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Rol;
use Auth;

class UsuariosController extends Controller {
    public function __construct() {
        $this->middleware('root');
    }

    public function index() {
        return view("usuarios.index", ["usuarios" => User::activos()]);
    }

    public function create() {
        return view("usuarios.create");
    }

    public function store(Request $request) {
        User::create([
            'nombre' => $request['nombre'],
            'apellido_paterno' => $request['apellido_paterno'],
            'apellido_materno' => $request['apellido_materno'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            "rols_id" => 3
        ]);
        return redirect("usuarios");
    }

    public function show($id) {
    }

    public function edit($id) {
        $user = User::where("id", $id)->firstOrFail();
        return view("usuarios.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::where("id", $id);
        $user->delete();
        return redirect("/usuarios")->with("session","Usuario eliminado");
    }
}
