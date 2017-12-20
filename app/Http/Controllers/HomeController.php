<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Remate;
use App\Categoria_bien;
use App\Subcategoria_bien;
use App\Bien;

class HomeController extends Controller {
    private $categorias;
    private $remates;
    private $bienes;
    private $subcategorias;

    public function __construct() {
        $this->remates = Remate::activos();
        $this->categorias = Categoria_bien::all();
        
        foreach($this->remates as $remate) {
            $this->bienes = $remate->bienes->filter(function($bien) {
                //Los remates deben estar conformados por bienes que cuenten con una valuacion, contengan imagenes
                //y su estado sea el de activo
                return $bien->estado != 0 && $bien->valuaciones()->count() > 0 && $bien->imagenes()->count() > 0;
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
        $bienes = Collect();
        if(sizeof($this->bienes)){
            foreach($this->bienes as $bien){
                foreach($bien->categorias as $categoria){
                    if($categoria->id == $Categoria->id){
                        $bienes->push($bien);
                    }
                }
            }
        }
        return view("subastas.index", ["categorias" => $this->categorias, "bienes" => $bienes, "categoria" => $categoria]);
    }
    
    public function subcategorias(Subcategoria_bien $subCategoria){
        $bienes = Collect();
        if(sizeof($this->bienes)){
            foreach($this->bienes as $bien) {
                foreach($bien->subcategorias as $subcategoria) {
                    if($subcategoria->id == $subCategoria->id) {
                        $bienes->push($bien);
                    }
                }
            }
        }
        return view("subastas.index", ["categorias" => $this->categorias, "bienes" => $bienes, "categoria" => $subCategoria]);
    }

}
