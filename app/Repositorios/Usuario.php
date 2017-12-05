<?php

namespace App\Repositorios;

use App\Articulo;
use App\Categoria_bien;
use App\Subcategoria_bien;
use DB;

class Usuario {
    
    public function categorias(Articulo $articulo) {
        return DB::table("articulos_categorias")
                    ->join("categorias", "articulos_categorias.categorias_id", "=", "categorias.id")
                    ->select("categorias.nombre","categorias.id")
                    ->where("articulos_categorias.articulos_id",$articulo->id)
                    ->groupBy("categorias.id")
                    ->get();
    }

    public function subcategorias(Categoria_bien $categoria) {
        return DB::table("articulos_categorias")
                    ->join("subcategorias", "articulos_categorias.subcategoria_id", "=", "subcategorias.id")
                    ->select("subcategorias.nombre","subcategorias.id")
                    ->where("articulos_categorias.categorias_id", $categoria->id)
                    ->get();
    }

    public function subsubcategoriassu(Subcategoria_bien $subcategoria){
        return DB::table("articulos_categorias")
                    ->join("subsubcategorias", "articulos_categorias.subsubcategoria_id", "=", "subsubcategorias.id")
                    ->select("subsubcategorias.nombre","subsubcategorias.id")
                    ->where("articulos_categorias.subcategoria_id",$subcategoria->id)
                    ->get();
    }

}