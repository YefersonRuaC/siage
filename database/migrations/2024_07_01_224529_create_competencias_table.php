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
        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->string('competencia');
            $table->string('programa_id')->nullable();
            $table->foreign('programa_id')->references('codigo')->on('programas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias');
    }
};
