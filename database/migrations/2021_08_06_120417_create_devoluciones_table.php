<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cotizacion');
            $table->string('fecha_emision');
             // Moneda asociada a la devolución de dinero
             $table->integer('moneda_id')->nullable()->unsigned();
             $table->foreign('moneda_id')->references('id')->on('monedas');
            // Sucursal que está generando la devolución
            $table->integer('sucursal_id')->nullable()->unsigned();
            $table->foreign('sucursal_id')->references('id')->on('sucursales');
            // Producto devuelto por el cliente asociado
            $table->integer('producto_devuelto_id')->unsigned();
            $table->foreign('producto_devuelto_id')->references('id')->on('productos');
            // Producto entregado al cliente asociado
            $table->integer('producto_entregado_id')->unsigned();
            $table->foreign('producto_entregado_id')->references('id')->on('productos');
            // Tipo de devolución asociado
            $table->integer('tipo_devoluciones_id')->unsigned();
            $table->foreign('tipo_devoluciones_id')->references('id')->on('tipo_devoluciones');
            // Cantidad de dinero entregado al cliente
            $table->double('cantidad_devolucion')->nullable();

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
        Schema::dropIfExists('devoluciones');
    }
}
