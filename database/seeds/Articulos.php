<?php

use Illuminate\Database\Seeder;

class Articulos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n = 1; $n <= 100; $n++){
            DB::table("articulos")->insert([
                "descripcion" => str_random("100"),
                "cantidad" => rand(1,500),
                "bienes_numero_control" => rand(1,500)
            ]);
        }
    }
}
