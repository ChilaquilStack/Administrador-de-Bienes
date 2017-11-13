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
        $this->call([
            //Contribuyentes::class,
            //Creditos::class,
            categorias::class,
            Estados::class,
            Municipios::class,
            SubcategoriasBienesTableSeeder::class,
            //Depositarios::class,
            //Domicilios::class,
            //Bienes::class,
            //Articulos::class
            bajas_creditos::class,
            bajas_articulos::class
        ]);
    }
}
