<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('ventas_cabecera', function (Blueprint $table) {
        $table->string('nombre_envio')->nullable();
        $table->string('telefono_envio')->nullable();
        $table->string('provincia')->nullable();
        $table->string('ciudad')->nullable();
        $table->string('direccion')->nullable();
        $table->string('numero')->nullable();
        $table->string('departamento')->nullable();
        $table->string('codigo_postal')->nullable();
        $table->text('referencias')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas_cabecera', function (Blueprint $table) {
            //
        });
    }
};
