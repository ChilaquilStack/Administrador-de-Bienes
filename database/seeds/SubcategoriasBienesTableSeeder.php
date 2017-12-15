<?php

use Illuminate\Database\Seeder;

class SubcategoriasBienesTableSeeder extends Seeder
{
    public function run()
    {
        $subcategorias = [
            "Cuadros y Pinturas",
            "Esculturas",
            "Libros y Revistas",
            "Cosméticos y Perfumes",
            "Adornos y Accesorios",
            "Anteojos y Varios",
            "Terrenos",
            "Casa Habitación",
            "Departamentos",
            "Edificios",
            "Locales Comerciales",
            "Teléfonos y Celulares",
            "Radio Localizadores",
            "Aparatos de Fax",
            "Otros Equipos",
            "Equipo Médico",
            "Instrumentos Médicos",
            "Cámaras Fotográficas",
            "Cámaras Digitales",
            "Video Cámaras",
            "Mecánicas",
            "Eléctricas",
            "Motor-Gas",
            "Automóviles",            
            "Camionetas", 
            "Camiones",
            "Motos",
            "Refacciones",
            "Partes Automotrices",
            "Herrería y Forja",
            "Materiales para Construcción"
    ];
    //DB::table('subcategorias')->truncate();
        foreach($subcategorias as $subcategoria) {
            DB::table('subcategorias')->insert([
                "nombre" => $subcategoria
            ]);
        }
    }
}
