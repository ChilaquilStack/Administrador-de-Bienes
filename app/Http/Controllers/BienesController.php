<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bien;
use App\Articulo;
class BienesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view("bienes.index");
    }

    
    public function create() {
        $categorias = DB::select("select id, descripcion from categorias");
        $subcategorias = DB::select("select id, descripcion from subcategorias");
        return view("articulos.add", ["categorias" => $categorias, "subcategorias" => $subcategorias]);
    }


    public function store(Request $request) {
    
    }

    public function show($id) {

        $articulo = Articulo::where("id", $id)->firstOrFail();
        
        $categorias = DB::table("categorias")->select("id", "nombre")->get();
        
        $articulo->categorias = DB::table("articulos_categorias")
            ->join("categorias", "articulos_categorias.categorias_id", "=", "categorias.id")
            ->select("categorias.nombre","categorias.id")
            ->where("articulos_categorias.articulos_id",$articulo->id)
            ->groupBy("categorias.id")
            ->get();
        
        foreach($articulo->categorias as $categoria) {
            $categoria->subcategorias = DB::table("articulos_categorias")
            ->join("subcategorias", "articulos_categorias.subcategoria_id", "=", "subcategorias.id")
            ->select("subcategorias.nombre","subcategorias.id")
            ->where("articulos_categorias.categorias_id",$categoria->id)
            ->get();
            foreach($categoria->subcategorias as $subcategoria){
                $subcategoria->subsubcategorias = DB::table("articulos_categorias")
                ->join("subsubcategorias", "articulos_categorias.subsubcategoria_id", "=", "subsubcategorias.id")
                ->select("subsubcategorias.nombre","subsubcategorias.id")
                ->where("articulos_categorias.subcategoria_id",$subcategoria->id)
                ->get();
            }
        }

        return view("bienes.edit", ["articulo" => $articulo, "categorias" => $categorias]);
        
    }

    public function edit($id) {

        $articulo = Articulo::where("id",$id)->firstOrFail();

        $articulo->categorias = DB::table("articulos_categorias")
        ->join("categorias", "articulos_categorias.categorias_id", "=", "categorias.id")
        ->select("categorias.nombre","categorias.id")
        ->where("articulos_categorias.articulos_id",$articulo->id)
        ->groupBy("categorias.id")
        ->get();
    
    foreach($articulo->categorias as $categoria) {
        $categoria->subcategorias = DB::table("articulos_categorias")
        ->join("subcategorias", "articulos_categorias.subcategoria_id", "=", "subcategorias.id")
        ->select("subcategorias.nombre","subcategorias.id")
        ->where("articulos_categorias.categorias_id",$categoria->id)
        ->get();
        foreach($categoria->subcategorias as $subcategoria){
            $subcategoria->subsubcategorias = DB::table("articulos_categorias")
            ->join("subsubcategorias", "articulos_categorias.subsubcategoria_id", "=", "subsubcategorias.id")
            ->select("subsubcategorias.nombre","subsubcategorias.id")
            ->where("articulos_categorias.subcategoria_id",$subcategoria->id)
            ->get();
        }
    }

        return view("bienes.edit", ["articulo" => $articulo, "categorias" => []]);
    }

    public function update(Request $request, $id) {

        $articulo = Articulo::where("id",$id)->firstOrFail();
        $articulo->fill($request->all());
        $articulo->save();
        return redirect("bienes");        
    }

    public function destroy(request $request) {
        $id = $request->input("id");
        $articulo = Articulo::where("id", $id)->firstOrFail();
        $articulo->estado = 0;
        $articulo->save();
        DB::insert("insert into bajas_articulos (motivos_bajas_articulos_id, articulos_id, usuarios_id, comentarios) values(?,?,?,?)", 
            [
                $request->input("baja"), $articulo->id, 1, $request->input("comentarios")
            ]
        );
        return response()->json("Credito Fiscal"." ".$articulo->id." "."se dio de Baja", 200);
    }

    public function bienes(){
        $bienes = Bien::all();  
        foreach($bienes as $bien){
            $bien->deposito->estado;
            $bien->depositario;
            $bien->creditos;
            $bien->cantidad = $bien->articulos()->count();
        }
        return response()->json(json_encode($bienes), 200);
    }

    public function articulos(request $request) {
        $articulos = Articulo::activos();
        foreach($articulos as $articulo) {
            $articulo->categorias;
            $articulo->subcategorias;
            $articulo->bien->creditos;
            $articulo->ultima_valuacion = $articulo->valuaciones->last();
        }
        return response()->json($articulos, 200);
    }
}