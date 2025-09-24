<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comprobante', function (Blueprint $table) {
            $table->bigIncrements('id_comprobante');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_tipo_pago');
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
            $table->foreign('id_tipo_pago')->references('id_tipo_pago')->on('tipo_de_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante');
    }
};
