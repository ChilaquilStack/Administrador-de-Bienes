<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Perito;
use DB;
use Carbon\Carbon;
class AvaluosController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view("avaluos.index");
    }

    
    public function create()
    {
        return view("avaluos.form");
    }

    public function store(Request $request) {
        $id = $request->input("avaluo.articulo");
        $articulo = Articulo::where("id",$id)->firstOrFail();
        $perito = new Perito([
            "nombre" => $request->input("avaluo.perito.nombre"),
            "apellido_paterno" => $request->input("avaluo.perito.apellido_paterno"),
            "apellido_materno" => $request->input("avaluo.perito.apellido_materno")
        ]);
        $perito->save();
        $monto = $request->input("avaluo.monto");
        $numero_dictamen = $request->input("avaluo.numero_dictamen");
        $fecha_avaluo = new Carbon($request->input("avaluo.fecha"));
        $articulo->valuaciones()->attach($perito->Id,["monto" => $monto, "numero_dictamen" => $numero_dictamen, "fecha" => $fecha_avaluo]);
        return response()->json("Se Valuo el bien correctamente" ,200);
    }

    public function show($id) {
        $articulo = Articulo::where("id", $id)->firstOrFail();
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
        return view("avaluos.add", ["articulo" => $articulo]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
