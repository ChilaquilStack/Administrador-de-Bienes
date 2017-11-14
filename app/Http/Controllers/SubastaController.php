<?php

namespace App\Http\Controllers;

use App\subasta;
use Illuminate\Http\Request;
use DB;
use App\Articulo;

class SubastaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
   
    public function index() {

        $articulos = Articulo::all();
        $categorias = DB::select("select id, descripcion from categorias");
        //return view("subastas.index", ["categorias" => $categorias, "articulos" => $articulos]);
    
        return view("subastas.show",["categorias" => $categorias]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(subasta $subasta)
    {
        
    }

    public function edit(subasta $subasta)
    {
        //
    }

    public function update(Request $request, subasta $subasta)
    {
        //
    }

    public function destroy(subasta $subasta)
    {
        //
    }
}
