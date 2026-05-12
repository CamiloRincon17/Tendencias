<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Multa extends Model
{
    protected $table      = 'multas';
    protected $primaryKey = 'ID_Multa';

    protected $fillable = [
        'ID_Prestamo',
        'Monto',
        'Estado',
    ];

    protected $casts = [
        'Monto' => 'decimal:2',
    ];

    /** La multa pertenece a un préstamo */
    public function prestamo(): BelongsTo
    {
        return $this->belongsTo(Prestamo::class, 'ID_Prestamo', 'ID_Prestamo');
    }
}
