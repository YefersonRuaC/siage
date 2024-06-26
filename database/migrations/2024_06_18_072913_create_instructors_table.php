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
        Schema::create('instructors', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->bigInteger('id')->primary();
            $table->string('tipo_doc');
            $table->string('name');
            $table->string('apellidos');
            $table->string('email');
            $table->string('celular');
            $table->string('direccion');
            $table->string('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
