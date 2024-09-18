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
        'pet_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pet() {
        return $this->belongsTo(Pet::class);
    }

    public function visits() {
        return $this->hasMany(Visit::class);
    }
    
}
