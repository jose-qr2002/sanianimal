<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'n_documento',
        'sexo',
        'email',
        'direccion',
        'fecha_nacimiento',
        'imagen',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date', // Para convertir automáticamente a tipo de fecha
    ];
}
