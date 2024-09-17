<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistory extends Model
{
    use HasFactory;

    protected $table = 'clinical_histories';

    protected$fillable = [
        'number',
        'reason',
        'mucous',
        'anamnesis',
        'diagnosis',
        'treatment',
        'weight',
        'price',
        'date',
        'pet_id',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pet() {
        return $this->belongsTo(Pet::class);
    }

    public function vaccines(){
        return $this->belongsToMany(Vaccine::class, 'applied_vaccines', 'historias_clinica_id', 'vaccine_id');
    }
}
