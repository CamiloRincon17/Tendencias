<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('multas', function (Blueprint $table) {
            $table->id('ID_Multa');
            $table->unsignedBigInteger('ID_Prestamo');
            $table->decimal('Monto', 10, 2);
            $table->enum('Estado', ['Pendiente', 'Pagada'])->default('Pendiente');
            $table->timestamps();

            $table->foreign('ID_Prestamo')
                  ->references('ID_Prestamo')->on('prestamos')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('multas');
    }
};
