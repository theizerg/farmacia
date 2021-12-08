<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboFacturasTable extends Migration
{   
    public function up()
    {
        Schema::create('recibo_facturas', function (Blueprint $table) {
            // Factura asociada
            $table->integer('factura_compra_id')->unsigned();
            $table->foreign('factura_compra_id')->references('id')->on('facturas_compras');

            // Recibo asociado
            $table->integer('recibo_compra_id')->unsigned();
            $table->foreign('recibo_compra_id')->references('id')->on('recibos_compras');
            
            $table->double('deuda_inicial');
            $table->double('deuda_final');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibo_facturas');
    }
}
