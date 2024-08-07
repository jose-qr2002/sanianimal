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

    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }
}
