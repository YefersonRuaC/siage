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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rol')->default(1); // 1 = aprendiz, 2 = instructor, 3 = administrador
            //4 = apoyo administrador, 5 = etapa practica
            $table->string('apellidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
            $table->dropColumn('apellidos');
        });
    }
};
