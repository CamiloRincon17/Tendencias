<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        Libro::insert([
            [
                'ISBN'        => '978-607-555-301-2',
                'Titulo'      => 'El Arte de la Programación',
                'Autor'       => 'Donald E. Knuth',
                'Disponibles' => 3,
            ],
            [
                'ISBN'        => '978-607-555-402-9',
                'Titulo'      => 'Clean Code: Código Limpio',
                'Autor'       => 'Robert C. Martin',
                'Disponibles' => 5,
            ],
            [
                'ISBN'        => '978-607-555-503-6',
                'Titulo'      => 'Diseño de Compiladores',
                'Autor'       => 'Alfred V. Aho',
                'Disponibles' => 2,
            ],
        ]);
    }
}
