<?php

use Illuminate\Database\Seeder;

class bajas_articulos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bajas = [
            "Retiro de Bienes por Pago del Crédito Fiscal Anterior al Remate",
            "Prescripción del Crédito Fiscal",
            "Adjudicación del Bien en Favor del Postor",
            "Adjudicación del Bien en Favor de la Autoridad Fiscal",
            "Abandono de Bienes en Favor del Fisco",
            "Resolución Amdinistrativa o Judicial"
        ];
        foreach($bajas as $baja) {
            DB::table("motivos_bajas_articulos")->insert([
                "descripcion" => $baja
            ]);
        }
    }
}
