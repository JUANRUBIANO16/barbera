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
        Schema::create('solicitud_citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('telefono', 15);
            $table->string('email', 50);
            $table->string('servicio', 50);
            $table->text('mensaje')->nullable();
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
            $table->boolean('leida')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_citas');
    }
};
