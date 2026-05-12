<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id('ID_Libro');
            $table->string('ISBN', 20)->unique();
            $table->string('Titulo', 200);
            $table->string('Autor', 150);
            $table->unsignedInteger('Disponibles')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
