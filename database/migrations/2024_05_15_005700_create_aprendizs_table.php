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
        Schema::create('aprendizs', function (Blueprint $table) {
            // $table->id('documento');
            // $table->timestamps();
            $table->bigInteger('documento')->primary();
            $table->string('tipo_doc');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('email')->unique();
            $table->string('estado');
            $table->unsignedBigInteger('ficha_id')->nullable();
            $table->foreign('ficha_id')->references('ficha')->on('fichas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprendizs');
    }
};
