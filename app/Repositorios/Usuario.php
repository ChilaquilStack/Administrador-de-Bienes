<?php

namespace App\Repositorios;

use App\Bien;
use App\Categoria_bien;
use App\Subcategoria_bien;
use DB;

class Usuario {
    
    public function categorias(Bien $bien) {
        return DB::table("bienes_categorias")
                    ->join("categorias", "bienes_categorias.categorias_id", "=", "categorias.id")
                    ->select("categorias.nombre","categorias.id")
                    ->where("bienes_categorias.bienes_numero_control",$bien->numero_control)
                    ->groupBy("categorias.id")
                    ->get();
    }

    public function subcategorias($id) {
        return DB::table("bienes_categorias")
                    ->join("subcategorias", "bienes_categorias.subcategoria_id", "=", "subcategorias.id")
                    ->select("subcategorias.nombre","subcategorias.id")
                    ->where("bienes_categorias.categorias_id", $id)
                    ->get();
    }

    public function subsubcategorias($id){
        return DB::table("bienes_categorias")
                    ->join("subsubcategorias", "bienes_categorias.subsubcategoria_id", "=", "subsubcategorias.id")
                    ->select("subsubcategorias.nombre","subsubcategorias.id")
                    ->where("bienes_categorias.subcategoria_id",$id)
                    ->get();
    }

}