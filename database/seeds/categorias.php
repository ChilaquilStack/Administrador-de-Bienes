<?php

use Illuminate\Database\Seeder;

class categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $categorias = [
                "Arte y Cultura",
                "Articulos Personales",
                "Bienes Inmuebles",
                "Equipos y Aparatos de Comunicación",
                "Equipo Hospitalario y Medico",
                "Equipo y Accesorio de Fotografia",
                "Equipos Linea Blanca y Aparatos Electonicos",
            ];
            foreach($categorias as $categoria) {
                DB::table('categorias')->insert([
                    "descripcion" => $categoria
                ]);
            }
    }
}
