<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyente;
use DB;

class ContribuyenteController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("contribuyentes.index");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id) {
        $estados = DB::select("select id, nombre from estados order by nombre asc");
        $municipios = DB::select("select id, nombre from municipios order by nombre asc");
        $contribuyente = Contribuyente::where("id",$id)->firstOrFail();
        $domicilios = $contribuyente->domicilios;
        return view("contribuyentes.show", ["contribuyente" => $contribuyente, "domicilios" => $domicilios, "estados" => $estados, "municipios" => $municipios]);
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

    public function contribuyentes () {
        $contribuyentes = Collect();
        foreach(contribuyente::all() as $contribuyente) {
            $contribuyente->domicilio = $contribuyente->domicilios()->first();
            //$contribuyente->domicilio->estado = $contribuyente->domicilios()->first()->estado->nombre;
            $contribuyentes->push($contribuyente);
        }
        return response()->json($contribuyentes, 200);
    }

    public function creditos(Request $request){
        $id = $request->input("id");
        $creditos = Contribuyente::where("id", $id)->firstOrFail()->creditos;
        return response()->json($creditos, 200);
    }
}
