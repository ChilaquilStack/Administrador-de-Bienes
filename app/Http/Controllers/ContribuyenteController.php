<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyente;
use DB;

class ContribuyenteController extends Controller
{
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
        $contribuyentes = contribuyente::all();
        foreach($contribuyentes as $contribuyente) {
            foreach($contribuyente->domicilios as $domicilio){
                $domicilio->estado;
            }
        }
        return response()->json(json_encode($contribuyentes), 200);
    }

    public function creditos(Request $request){
        $id = $request->input("id");
        $creditos = Contribuyente::where("id", $id)->firstOrFail()->creditos;
        return response()->json(json_encode($creditos), 200);
    }
}
