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
        Schema::create('cita', function (Blueprint $table) {
            $table->bigIncrements('id_cita');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('estado', 10)->nullable();
            $table->string('descripcion', 30)->nullable();
            $table->unsignedBigInteger('id_clie');
            $table->unsignedBigInteger('id_barbero');
            $table->foreign('id_clie')->references('id_clie')->on('cliente');
            $table->foreign('id_barbero')->references('id_barbero')->on('barbero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
