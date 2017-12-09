<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria_bien;
use App\Subcategoria_bien;
use App\subsubcategoria;

class CategoriasController extends Controller {

    public function index(request $request){
        if($request->isMethod("post")){
            
            $Categoria = $request->input("categoria");

            $categoria = new Categoria_bien([
                "nombre" => $Categoria["nombre"]
            ]);
            $categoria->save();
            if(array_has($Categoria, "subcategorias")){
                foreach($Categoria["subcategorias"] as $subcategoria){
                    $Subcategoria = new Subcategoria_bien([
                         "nombre" => $subcategoria["nombre"]
                    ]);
                    $Subcategoria->save();
                    $categoria->subcategorias()->attach($Subcategoria->id);
                    if(array_has($subcategoria, "subsubcategorias")) {
                        foreach ($subcategoria["subsubcategorias"] as $subsubcategoria) {
                            $Subsubcategoria = new subsubcategoria([
                                "nombre" => $subsubcategoria
                            ]);
                            $Subsubcategoria->save();
                            $Subcategoria->subsubcategorias()->attach($Subsubcategoria->id);
                        }
                    }
                }
            }
            return response()->json("Se agrego la categoria correctamente ", 200);
        }
        $categorias = Categoria_bien::all();
        return view("categorias.index", ["categorias" => $categorias]);
    }

    public function destroy($id){
        $categoria = Categoria_bien::find($id);
        $categoria->bienes()->detach();
        $categoria->subcategorias()->detach();
        $categoria->delete();
        return redirect("categorias")->with("status","Se elimino la categoria correctamente");
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
