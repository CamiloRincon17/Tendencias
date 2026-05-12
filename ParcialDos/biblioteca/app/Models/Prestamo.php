<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prestamo extends Model
{
    protected $table      = 'prestamos';
    protected $primaryKey = 'ID_Prestamo';

    protected $fillable = [
        'ID_Usuario',
        'ID_Libro',
        'FechaPrestamo',
        'FechaDevolucion',
        'Estado',
    ];

    protected $casts = [
        'FechaPrestamo'   => 'date',
        'FechaDevolucion' => 'date',
    ];

    /** El préstamo pertenece a un usuario */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario', 'ID_Usuario');
    }

    /** El préstamo pertenece a un libro */
    public function libro(): BelongsTo
    {
        return $this->belongsTo(Libro::class, 'ID_Libro', 'ID_Libro');
    }

    /** Un préstamo puede generar muchas multas */
    public function multas(): HasMany
    {
        return $this->hasMany(Multa::class, 'ID_Prestamo', 'ID_Prestamo');
    }
}
