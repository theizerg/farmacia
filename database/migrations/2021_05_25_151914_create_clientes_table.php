<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre');
            $table->string('apellido')->nullable();

            $table->boolean('empresa')->default(0);
            $table->string('rut')->nullable();
            
            $table->string('mail')->nullable();
            $table->string('direccion')->nullable(); 
            
            $table->string('genero')->nullable(); 

            // Descuento asociado
            $table->integer('descuento_id')->unsigned()->nullable();
            $table->foreign('descuento_id')->references('id')->on('descuentos');

            $table->integer('tipo_documento_id')->unsigned()->nullable();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');

            // Plazo factura por defecto
            $table->integer('plazo_factura')->nullable();

            $table->integer('sucursal_id')->unsigned()->nullable();
            $table->foreign('sucursal_id')->references('id')->on('sucursales');

            $table->softDeletes();
            $table->timestamps();

            $table->index(['mail', 'rut']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
