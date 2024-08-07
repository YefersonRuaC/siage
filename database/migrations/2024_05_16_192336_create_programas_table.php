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
        Schema::create('programas', function (Blueprint $table) {
            // $table->id('programa');
            // $table->integer('codigo')->primary()->unsigned();
            $table->string('codigo')->primary();
            $table->string('nombre_corto');
            $table->string('nombre_completo');
            $table->integer('trimestres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
