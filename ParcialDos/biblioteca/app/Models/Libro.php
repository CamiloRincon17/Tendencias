<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Libro extends Model
{
    protected $table      = 'libros';
    protected $primaryKey = 'ID_Libro';

    protected $fillable = [
        'ISBN',
        'Titulo',
        'Autor',
        'Disponibles',
    ];

    /** Un libro puede estar en muchos préstamos */
    public function prestamos(): HasMany
    {
        return $this->hasMany(Prestamo::class, 'ID_Libro', 'ID_Libro');
    }
}
