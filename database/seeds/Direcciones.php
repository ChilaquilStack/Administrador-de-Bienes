<?php

use Illuminate\Database\Seeder;

class Direcciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("direcciones")->insert([
            "contribuyentes_id" => rand(),
            "domicilios_id" => rand(),
        ]);
    }
}
