<?php

use Illuminate\Database\Seeder;

class CatergoriasBienesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            "nombre"
        ];

        BD::table('catergorias')->insert([

        ])
    }
}
