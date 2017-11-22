<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria_bien;

class CategoriasController extends Controller {

    public function index(request $request){
        if($request->isMethod("post")){
            $categoria = new Categoria_bien([
                "descripcion" => $request->input("categoria.nombre")
            ]);
            $categoria->save();
            return response()->json("Ok", 200);
        }
        return view("categorias.index");
    }
    
}
