<?php

use Illuminate\Database\Seeder;

class Depositarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n = 1; $n <= 500; $n++){
            DB::table("Depositarios")->insert([
                "Nombre" => "depositario_".$n,
                "Apellido_Paterno" => str_random(5),
                "apellido_materno" => str_random(5)
            ]);
        }
    }
}
