<?php

namespace App\Http\Controllers;

use App\subasta;
use Illuminate\Http\Request;
use DB;
use App\Articulo;

class SubastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        $categorias = DB::select("select id, descripcion from categorias");
        return view("subastas.index", ["categorias" => $categorias, "articulos" => $articulos]);
    
        //return view("subastas.show",["categorias" => $categorias]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function show(subasta $subasta)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function edit(subasta $subasta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subasta $subasta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(subasta $subasta)
    {
        //
    }
}
