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
            Contribuyentes::class,
            Creditos::class,
            categorias::class,
            Estados::class,
            Municipios::class,
            Bienes::class,
            SubcategoriasBienesTableSeeder::class
        ]);
    }
}
