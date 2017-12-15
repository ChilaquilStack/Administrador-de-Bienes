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
            "Artículos Personales",
            "Bienes Inmuebles",
            "Equipos y Aparatos de Comunicación",
            "Equipo Hospitalario y Medico",
            "Equipo y Accesorio de Fotografía",
            "Equipos Línea Blanca y Aparatos Electrónicos",
            "Herramientas",
            "Joyas, Metales Valiosos y Amonedados",
            "Locales Comerciales, Móviles",
            "Telas, Prendas y Artículos de Vestir",
            "Vinos y Licores",
            "Deportes",
            "Vehículos Automotores",
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
