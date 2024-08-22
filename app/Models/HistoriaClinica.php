<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;

    protected $table = 'historias_clinicas';

    protected$fillable = [
        'numero',
        'motivo',
        'mucosas',
        'anamnesis',
        'diagnostico',
        'tratamiento',
        'precio',
        'mascota_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mascota() {
        return $this->belongsTo(Mascota::class);
    }
}