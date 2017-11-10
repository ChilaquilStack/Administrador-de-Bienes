<?php

use Illuminate\Database\Seeder;

class bajas_creditos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bajas = [
            "Pago Total del Crédito Fiscal",
            "Prescripción",
            "Cancelación del Crédito Fiscal",
            "Condonación",
            "Extinción",
            "Resolución de Recurso de Revocación",  
            "Sentencia de Juicio de Nulidad",
            "Ejecutoria de Amparo Indirecto",
            "Ejecutoria de Amparo Directo",
            "Traslado del Crédito Fiscal a otra Entidad Federativa/Federación",
            "Valor de la Adjudicación de los Bienes 60% del valor del avalúo"
        ];
        foreach($bajas as $baja) {
            DB::table("motivos_bajas_creditos_fiscales")->insert([
                "descripcion" => $baja
                ]);
        }
    }
}
