<?php

use Illuminate\Database\Seeder;

class Domicilios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n = 1; $n <= 500; $n++){
            DB::table("Domicilios")->insert([
                "cp" => "44400",
                "int" => rand(0,100),
                "ext" => rand(0,100),
                "calle" => "calle".$n,
                "colonia" => "colonia".$n,
                "estados_id" => rand(1,25)
            ]);
        }
    }
}
