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
        Schema::create('disponibilidad', function (Blueprint $table) {
            $table->bigIncrements('id_disp');
            $table->date('fecha')->nullable();
            $table->time('hora_de_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->unsignedBigInteger('id_barbero');
            $table->foreign('id_barbero')->references('id_barbero')->on('barbero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidad');
    }
};
