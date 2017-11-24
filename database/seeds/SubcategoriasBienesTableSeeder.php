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
            "Cosmeticos y Perfumes",
            "Adornos y Accesorios",
            "Anteojos y Varios",
            "Terrenos",
            "Casa Habitación",
            "Departamentos",
            "Edificios",
            "Locales Comerciales",
            "Telefonos y Celulares",
            "Radio Localizadores",
            "Aparatos de Fax",
            "Otros Equipos",
            "Equipo Medico",
            "Instrumenos Medicos",
            "Camaras Fotograficas",
            "Camaras Digitales",
            "Video Camaras",
            "Mecanicas",
            "Electricas",
            "Motor-Gas",
            "Automoviles",            
            "Camionetas", 
            "Camiones",
            "Motos",
            "Refacciones",
            "Partes Automotrices",
            "Herreria y Forja",
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
