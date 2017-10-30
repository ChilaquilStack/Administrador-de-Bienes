<?php

use Illuminate\Database\Seeder;

class Creditos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $origen_credito = ["Anexo18", "ISTUV", "Control de Obligaciones", "Multas federales no fiscales", "Liquidaciones DAFE"];
        //DB::table('Creditos_Fiscaless')->truncate();
        for($n = 1; $n <= 1000; $n++){
            DB::table("creditos_fiscales")->insert([
                "folio" => $n,
                "monto" => rand(1,1000000),
                "documento_determinante" => str_random("5"),
                "origen_credito" => $origen_credito[rand(0,4)],
                "contribuyentes_id" => rand(1,500)
            ]);
        }
    }
}