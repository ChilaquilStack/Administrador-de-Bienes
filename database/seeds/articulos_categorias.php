<?php

use Illuminate\Database\Seeder;

class articulos_categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n = 0; $n <= 1000; $n++){
            DB::table("articulos_categorias")->insert([
                "articulos_id" => rand(1,10000),
                "categorias_id" => rand(1,7)
            ]);
        }
    }
}
