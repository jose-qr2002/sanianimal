<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine',
        'stock',
        'detail'
    ];

    public function historys(){
        return $this->belongsToMany(HistoriaClinica::class, 'applied_vaccines', 'vaccine_id','historias_clinica_id');
    }
}
