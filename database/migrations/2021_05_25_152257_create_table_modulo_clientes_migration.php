<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableModuloClientesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('clientes', function (Blueprint $table) {
            $table->string('telefono')->nullable();
            $table->string('documento')->nullable();
            $table->integer('tipo_documento')->unsigned()->nullable();
            $table->foreign('tipo_documento', 'cliente_tipo_documento')->references('id')->on('tipo_documentos');
            $table->index(['documento']);
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('telefono');
            $table->dropColumn('documento');            
        });
    }
}
