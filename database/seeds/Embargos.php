<?php

use Illuminate\Database\Seeder;

class Embargos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n = 0; $n < 100; $n++){
            DB::table("embargos")->insert([
                "creditos_fiscales_folio" => rand(1,1000),
                "bienes_numero_control" => rand(1, 500),
                "documento" => str_random(rand(3,5)),
                "fecha" => rand(1,31)."/".rand(1,12)."/".rand(1900, 2017)
            ]);
        }
    }
}
