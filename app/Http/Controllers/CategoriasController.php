<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria_bien;
use App\Subcategoria_bien;

class CategoriasController extends Controller {

    public function index(request $request){
        if($request->isMethod("post")){
            $categoria = new Categoria_bien([
                "nombre" => $request->input("categoria.nombre")
            ]);
            $categoria->save();
            foreach($request->input("categoria.subcategorias") as $subcategoria){
                 $subcategoria = new Subcategoria_bien([
                     "nombre" => $subcategoria["nombre"]
                ]);
                $subcategoria->save();
                $categoria->subcategorias()->attach($subcategoria->id);
            }
            return response()->json("Se agrego la categoria correctamente ", 200);
        }
        $categorias = Categoria_bien::all();
        return view("categorias.index", ["categorias" => $categorias]);
    }

    public function subcategorias(request $request) {
        $subcategorias = Categoria_bien::where("id", $request->input("id"))->firstOrFail()->subcategorias;
        return response()->json($subcategorias, 200);
    }
    
    public function subsubcategorias(request $request) {
        $subsubcategorias = Subcategoria_bien::where("id", $request->input("id"))->firstOrFail()->subsubcategorias;
        return response()->json($subsubcategorias, 200);
    }
}
