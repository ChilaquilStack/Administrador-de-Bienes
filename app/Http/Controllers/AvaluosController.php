<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Perito;
use DB;
class AvaluosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("avaluos.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("avaluos.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $articulo->valuaciones()->attach($perito->Id,["monto" => $monto, "numero_dictamen" => $numero_dictamen]);
        return response()->json("Todo chido carnal" ,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $subcategorias = DB::select("select id, descripcion from subcategorias");
        $articulo = Articulo::where("id", $id)->firstOrFail();
        return view("avaluos.add", ["articulo" => $articulo, "categorias" => $articulo->categorias, "subcategorias" => $subcategorias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
