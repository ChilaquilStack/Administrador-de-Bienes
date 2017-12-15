<?php

namespace App\Http\Controllers;

use App\subasta;
use Illuminate\Http\Request;
use DB;
use App\Remate;
use App\Bien;

class SubastaController extends Controller
{

    private $categorias;
    public function __construct() {
        $this->middleware('guest');
        $this->categorias = DB::table("categorias")->select("id","nombre")->get();
    }
   
    public function index() {

        $remate = Remate::paginate(1);
        return view("subastas.index", ["categorias" => $this->categorias, "remates" => $remates]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($bien) {
        $bien = Bien::where("numero_control", $bien)->firstOrFail();
        return view("subastas.show",["categorias" => $this->categorias, "bien" => $bien]);
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
