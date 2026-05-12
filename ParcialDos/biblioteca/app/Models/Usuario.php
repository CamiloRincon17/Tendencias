<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'ID_Usuario';

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Email',
        'Tipo',
    ];

    /** Un usuario puede tener muchos préstamos */
    public function prestamos(): HasMany
    {
        return $this->hasMany(Prestamo::class, 'ID_Usuario', 'ID_Usuario');
    }
}
