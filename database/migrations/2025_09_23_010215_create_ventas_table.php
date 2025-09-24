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
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id_venta');
            $table->integer('valor');
            $table->integer('cantidad')->nullable();
            $table->integer('total')->nullable();
            $table->unsignedBigInteger('id_serv');
            $table->unsignedBigInteger('id_clie');
            $table->foreign('id_serv')->references('id_serv')->on('servicio');
            $table->foreign('id_clie')->references('id_clie')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
