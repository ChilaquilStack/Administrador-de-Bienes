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
        $subcategorias = DB::select("select id, descripcion from subcategorias");
        $articulo = Articulo::where("id", $id)->firstOrFail();
        return view("avaluos.add", ["articulo" => $articulo, "categorias" => $articulo->categorias, "subcategorias" => $subcategorias]);
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
