<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'heart_rate',
        'respiratory_rate',
        'temperature',
        'anamnesis',
        'symptoms',
        'exams',
        'differential_diagnosis',
        'definitive_diagnosis',
        'treatment',
        'exam_results',
        'recommendations',
        'recipes',
        'weight',
        'price',
        'date',
        'time',
        'clinical_history_id',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function vaccines(){
        return $this->belongsToMany(Vaccine::class, 'applied_vaccines', 'visit_id', 'vaccine_id')->withPivot('id','observation', 'created_at');
    }

    public function history() {
        return $this->belongsTo(ClinicalHistory::class, 'clinical_history_id');
    }
}
