<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Multa;

class MultaSeeder extends Seeder
{
    public function run(): void
    {
        Multa::insert([
            [
                'ID_Prestamo' => 3,
                'Monto'       => 25000.50,
                'Estado'      => 'Pendiente',
            ],
            [
                'ID_Prestamo' => 2,
                'Monto'       => 10500.00,
                'Estado'      => 'Pendiente',
            ],
            [
                'ID_Prestamo' => 1,
                'Monto'       => 12000.00,
                'Estado'      => 'Pagada',
            ],
        ]);
    }
}
