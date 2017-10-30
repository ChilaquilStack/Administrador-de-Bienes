<?php

use Illuminate\Database\Seeder;

class Bienes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n = 1; $n <= 500; $n++){
            DB::table("bienes")->insert([
                "numero_control" => $n,
                "depositarios_id" => rand(1,500),
                "deposito_id" => rand(1,500)
            ]);
        }
    }
}
