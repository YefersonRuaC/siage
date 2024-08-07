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
        Schema::create('actividad_rap', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->foreignId('actividad_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('rap_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad_rap');
    }
};
