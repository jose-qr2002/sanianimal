<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';
    protected $fillable = [
        'nombre',
        'sexo',
        'color',
        'pedigree',
        'cliente_id',
        'especie_id',
        'fecha_nacimiento',
        'raza',
        'imagen',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
    
}
