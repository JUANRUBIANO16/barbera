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
        // Cambiar telefono de integer a string en administrador
        Schema::table('administrador', function (Blueprint $table) {
            $table->string('telefono', 15)->nullable()->change();
        });

        // Cambiar telefono de integer a string en barbero
        Schema::table('barbero', function (Blueprint $table) {
            $table->string('telefono', 15)->nullable()->change();
        });

        // Cambiar telefono de integer a string en cliente
        Schema::table('cliente', function (Blueprint $table) {
            $table->string('telefono', 15)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir cambios
        Schema::table('administrador', function (Blueprint $table) {
            $table->integer('telefono')->nullable()->change();
        });

        Schema::table('barbero', function (Blueprint $table) {
            $table->integer('telefono')->nullable()->change();
        });

        Schema::table('cliente', function (Blueprint $table) {
            $table->integer('telefono')->nullable()->change();
        });
    }
};
