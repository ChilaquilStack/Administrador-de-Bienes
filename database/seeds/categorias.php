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
            "Herramientas",
            "Joyas, Metales Valiosos y Amonedados",
            "Locales Comerciales, Moviles",
            "Telas, Prendas y Articulos de Vestir",
            "Vinos y Licores",
            "Deportes",
            "Vehiculos Automotores",
            "Varios"
        ];
        //DB::table('categorias')->truncate();
        foreach($categorias as $categoria) {
            DB::table('categorias')->insert([
                "nombre" => $categoria
            ]);
        }
    }
}
