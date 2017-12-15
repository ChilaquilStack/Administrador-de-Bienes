<?php

use Illuminate\Database\Seeder;

class Subsubcategorias extends Seeder
{
    
    public function run()
    {
        $subsubcategorias = [
            "Pick Up",
            "Estaquitas",
            "Carga",
            "Pasajero",
            "Tráiler"
        ];

        foreach ($subsubcategorias as $subsubcategoria) {
            DB::table("subsubcategorias")->insert([
                    "nombre" => $subsubcategoria
            ]);
        }
    }
}