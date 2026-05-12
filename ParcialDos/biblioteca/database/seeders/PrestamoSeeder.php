<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestamo;

class PrestamoSeeder extends Seeder
{
    public function run(): void
    {
        Prestamo::insert([
            [
                'ID_Usuario'      => 1,
                'ID_Libro'        => 2,
                'FechaPrestamo'   => '2026-05-01',
                'FechaDevolucion' => null,
                'Estado'          => 'Activo',
            ],
            [
                'ID_Usuario'      => 2,
                'ID_Libro'        => 1,
                'FechaPrestamo'   => '2026-04-10',
                'FechaDevolucion' => '2026-04-30',
                'Estado'          => 'Devuelto',
            ],
            [
                'ID_Usuario'      => 3,
                'ID_Libro'        => 3,
                'FechaPrestamo'   => '2026-03-05',
                'FechaDevolucion' => null,
                'Estado'          => 'Vencido',
            ],
        ]);
    }
}
