<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('ID_Prestamo');
            $table->unsignedBigInteger('ID_Usuario');
            $table->unsignedBigInteger('ID_Libro');
            $table->date('FechaPrestamo');
            $table->date('FechaDevolucion')->nullable();
            $table->enum('Estado', ['Activo', 'Devuelto', 'Vencido'])->default('Activo');
            $table->timestamps();

            $table->foreign('ID_Usuario')
                  ->references('ID_Usuario')->on('usuarios')
                  ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('ID_Libro')
                  ->references('ID_Libro')->on('libros')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
