<?php

use Illuminate\Database\Seeder;

class Contribuyentes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //DB::table('contribuyentes')->truncate();
        for($n = 1; $n <= 500; $n++){
            DB::table("Contribuyentes")->insert([
                "Nombre" => "contribuyente_".$n,
                "Apellido_Paterno" => str_random(10),
                "apellido_materno" => str_random(10),
                "telefono" => str_random(10),
                "RFC" => str_random(12),
                "CURP" => str_random(12)
            ]);
        }
    }
}
