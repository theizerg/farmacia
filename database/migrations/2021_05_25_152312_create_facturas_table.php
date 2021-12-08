<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');

            // Comprobante asociado
            $table->integer('comprobante_id')->unsigned();
            $table->foreign('comprobante_id')->references('id')->on('comprobantes');

            $table->date('fecha_vencimiento');
            $table->integer('plazo')->nullable();
            
            $table->double('deuda_original');
            $table->double('deuda_actual');

            $table->index(['fecha_vencimiento']);
            $table->timestamps();

            $table->index(['comprobante_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
    
}
