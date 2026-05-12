<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::insert([
            [
                'Nombre'   => 'Sofía',
                'Apellido' => 'Hernández',
                'Email'    => 'sofia.hernandez@uni.edu',
                'Tipo'     => 'Estudiante',
            ],
            [
                'Nombre'   => 'Miguel',
                'Apellido' => 'Torres',
                'Email'    => 'miguel.torres@uni.edu',
                'Tipo'     => 'Docente',
            ],
            [
                'Nombre'   => 'Valentina',
                'Apellido' => 'Castro',
                'Email'    => 'valentina.castro@uni.edu',
                'Tipo'     => 'Administrativo',
            ],
        ]);
    }
}
