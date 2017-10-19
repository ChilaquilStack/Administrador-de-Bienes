<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditosFiscalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos_fiscales', function (Blueprint $table) {
            $table->integer('folio');
            $table->double('monto',15, 8)   ;
            $table->string('documento_determinante', 45);
            $table->tinyInteger('estado')->default(1);
            $table->string('origen', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creditos_fiscales');
    }
}
