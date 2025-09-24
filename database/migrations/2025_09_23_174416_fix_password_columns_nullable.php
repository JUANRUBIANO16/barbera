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
        Schema::table('administrador', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
        });

        Schema::table('barbero', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
        });

        Schema::table('cliente', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administrador', function (Blueprint $table) {
            $table->string('password')->nullable(false)->change();
        });

        Schema::table('barbero', function (Blueprint $table) {
            $table->string('password')->nullable(false)->change();
        });

        Schema::table('cliente', function (Blueprint $table) {
            $table->string('password')->nullable(false)->change();
        });
    }
};
