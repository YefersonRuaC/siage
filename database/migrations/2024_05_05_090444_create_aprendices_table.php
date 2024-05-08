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
        Schema::create('aprendices', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('documento')->primary();
            $table->string('tipo_doc');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('email')->unique();
            $table->string('estado');
            // $table->foreignId('ficha_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprendices');
    }
};
