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
        Schema::create('barbero', function (Blueprint $table) {
            $table->bigIncrements('id_barbero');
            $table->string('nombre', 30)->nullable();
            $table->string('apellido', 30)->nullable();
            $table->string('disponibilidad', 10)->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('num_doc')->nullable();
            $table->integer('salario')->nullable();
            $table->tinyInteger('edad')->nullable();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbero');
    }
};
