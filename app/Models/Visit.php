<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'reason',
        'mucous',
        'anamnesis',
        'diagnosis',
        'treatment',
        'weight',
        'price',
        'date',
        'clinical_history_id'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function vaccines(){
        return $this->belongsToMany(Vaccine::class, 'applied_vaccines', 'visit_id', 'vaccine_id');
    }
}
