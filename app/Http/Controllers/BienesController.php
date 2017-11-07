<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bien;
use App\Articulo;
class BienesController extends Controller
{
    public function index() {
        return view("bienes.index");
    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $articulo = Articulo::where("id", $id)->firstOrFail();
        $categorias = DB::select("select id, descripcion from categorias order by descripcion asc");
        $subcategorias = DB::select("select id, descripcion from subcategorias order by descripcion asc");
        return view("bienes.edit", ["articulo" => $articulo, "categorias" => $categorias, "subcategorias" => $subcategorias]);
    }
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        //
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
    public function articulos(request $request){
        $numero_control = $request->input("numero_control");
        $articulos = Bien::where("numero_control", $numero_control)->firstOrFail()->articulos;
        foreach($articulos as $articulo){
            $articulo->categorias;
            $articulo->ultima_valuacion = $articulo->valuaciones->first();
        }
        return response()->json(json_encode($articulos), 200);
    }
}