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
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id_clie');
            $table->string('nombre', 30)->nullable();
            $table->string('apellido', 30)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('correo', 40)->nullable();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
