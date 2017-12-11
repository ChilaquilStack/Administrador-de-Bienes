<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria_bien;
use App\Subcategoria_bien;
use App\subsubcategoria;

class CategoriasController extends Controller {

    public function index(request $request){
        if($request->isMethod("post")){
            
            $categoria = $request->input("categoria");

            $categoria = new Categoria_bien([
                "nombre" => $categoria["nombre"]
            ]);
            $categoria->save();
            return response()->json("Se agrego la categoria correctamente ", 200);
        }
        $categorias = Categoria_bien::all();
        return view("categorias.index", ["categorias" => $categorias]);
    }

    public function destroy($id){
        $categoria = Categoria_bien::find($id);
        $nombre = $categoria->nombre;
        $categoria->bienes()->detach();
        $categoria->subcategorias()->detach();
        $categoria->delete();
        return redirect("categorias")->with("status","Se elimino la categoria"." ".$nombre." "."correctamente");
    }

    public function subcategoria_destroy($id){
        $subcategoria = Subcategoria_bien::find($id);
        $nombre = $subcategoria->nombre;
        $subcategoria->categorias()->detach();
        $subcategoria->subsubcategorias()->detach();
        $subcategoria->delete();
        return redirect("categorias")->with("status","Se elimino la subcategoria"." ".$nombre." "."correctamente");
    }

    public function subcategoria_create(request $request){
            $categoria = $request->input("categoria");
            $Categoria = Categoria_bien::find($categoria["id"]);
            $Categoria->subcategorias()->create([
                "nombre" => $categoria["subcategoria"]["nombre"]
            ]);
            return response()->json("Se agrego la subcategoria correctamente ", 200);
    }

    public function subsubcategoria_destroy($id){
        $subsubcategoria = subsubcategoria::find($id);
        $nombre = $subsubcategoria->nombre;
        $subsubcategoria->subcategorias()->detach();
        $subsubcategoria->delete();
        return redirect("categorias")->with("status","Se elimino la subsubcategoria"." ".$nombre." "."correctamente");
    } 
    
    public function subsubcategoria_create(request $request){
        $subcategoria = $request->input("subcategoria");
        $Subcategoria = Subcategoria_bien::find($subcategoria["id"]);
        $Subcategoria->subsubcategorias()->create([
            "nombre" => $subcategoria["subsubcategoria"]["nombre"]
        ]);
        return response()->json("Se agrego la subsubcategoria correctamente ", 200);
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
