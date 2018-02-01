<?php

namespace App\Http\Controllers;
use App\Repositorios\Usuario;
use App\Http\Requests\CreditosRequest;
use App\Http\Requests\BienesRequest;
use App\Credito;
use App\Contribuyente;
use App\Domicilio;
use App\Bien;
use App\Articulo;
use App\Depositario;
use App\Estado;
use DB;

use Illuminate\Http\Request;

class CreditosController extends Controller {
    
    private $users, $estados, $municipios, $categorias, $subcategorias;

    public function __construct(Usuario $users){
        $this->users = $users;
        $this->estados = DB::table("estados")->select("id", "nombre")->orderBy("nombre", "asc")->get();
        $this->municipios = DB::table("municipios")->select("id", "nombre")->orderBy("nombre", "asc")->get();
        $this->categorias = DB::table("categorias")->select("id", "nombre")->orderBy("nombre", "asc")->get();
        $this->subcategorias = DB::table("subcategorias")->select("id", "nombre")->orderBy("nombre", "asc")->get();
    }

    public function index() {

        $origenes_del_credito = [
            "1"=> "Anexo 18", 
            "2" => "ISTUV", 
            "3" => "Control de Obligaciones", 
            "4" => "Multas Federales No Fiscales", 
            "5" => "Liquidaciones DAFE" 
        ];

        $bajas_articulos = DB::table("motivos_bajas_bienes")->select("id", "descripcion")->orderBy("descripcion", "asc")->get();
        return view("index",
            [
                "bajas_articulos" => $bajas_articulos, 
                "categorias" => $this->categorias,
                "estados" => $this->estados,
                "municipios" => $this->municipios,
                "origenes" => $origenes_del_credito
            ]);
    }

    public function create() {
        return response()->json(Credito::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        Credito::create($request->all());
        return response()->json("Credito Creado con exito", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function edit(Credito $credito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
    }
}
