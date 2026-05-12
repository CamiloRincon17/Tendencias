<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Orden importante: respetar las llaves foráneas
        $this->call([
            UsuarioSeeder::class,
            LibroSeeder::class,
            PrestamoSeeder::class,
            MultaSeeder::class,
        ]);
    }
}
