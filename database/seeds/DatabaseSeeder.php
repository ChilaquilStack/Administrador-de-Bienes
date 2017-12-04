<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rols = [1 => "admin", 2 => "postor"];

        foreach($rols as $key => $rol){
            DB::table("rols")->insert([
                "id" => $key,
                "nombre" => $rol
            ]);
        }
        DB::table("users")->insert([
            "nombre" => "Edgar Enrique",
            "apellido_paterno" => "Villegas",
            "apellido_materno" => "Briseño",
            "email" => "edgar.villegas@jalisco.gob.mx",
            "password" => bcrypt("123456"),
            "rols_id" => 1
        ]);
        $this->call([
            //Contribuyentes::class,
            //Creditos::class,
            categorias::class,
            Estados::class,
            Municipios::class,
            SubcategoriasBienesTableSeeder::class,
            Subsubcategorias::class,
            //Depositarios::class,
            //Domicilios::class,
            //Bienes::class,
            //Articulos::class
            bajas_creditos::class,
            bajas_articulos::class
        ]);
    }
}
