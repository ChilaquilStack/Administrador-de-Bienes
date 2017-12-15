<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Remate;
use App\Categoria_bien;
use App\Bien;

class HomeController extends Controller
{
    private $categorias;
    private $remates;
    private $bienes;
    private $subcategorias;

    public function __construct() {
        $this->remates = Remate::activos();
        $this->categorias = Categoria_bien::all();
        
        foreach($this->remates as $remate) {
            $this->bienes = $remate->bienes->filter(function($bien){
                return $bien->estado != 0;
            });
        }
    }

    public function index() {
        return view("subastas.index", ["categorias" => $this->categorias, "bienes" => $this->bienes]);
    }

    public function show($bien) {
        $bien = Bien::where([["numero_control", $bien], ["estado", 1]])->firstOrFail();
        return view("subastas.show",["categorias" => $this->categorias, "bien" => $bien]);
    }

    public function categorias(Categoria_bien $categoria) {
        $this->bienes = $categoria->bienes->where("estado", 1);
        return view("subastas.index", ["categorias" => $this->categorias, "bienes" => $this->bienes, "categoria" => $categoria]);
    }

    public function subcategorias(Subcategoria_bien $subcategoria){
        return view("subastas.index", ["categorias" => $this->categorias, "bienes" => [], "categoria" => $subcategoria]);
    }

}
