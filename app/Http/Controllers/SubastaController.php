<?php

namespace App\Http\Controllers;

use App\subasta;
use Illuminate\Http\Request;
use DB;
use App\Remate;
use App\Articulo;
class SubastaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
   
    public function index() {

        $remates = Remate::activos();
        $categorias = DB::table("categorias")->select("id","nombre")->get();
        return view("subastas.index", ["categorias" => $categorias, "remates" => $remates]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($articulo) {
        $articulo = Articulo::where("id", $articulo)->firstOrFail();
        $categorias = DB::select("select id, nombre from categorias");
        return view("subastas.show",["categorias" => $categorias, "articulo" => $articulo]);
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
