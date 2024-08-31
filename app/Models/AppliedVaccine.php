<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedVaccine extends Model
{
    use HasFactory;

    protected $table = 'applied_vaccines';

    protected $fillable = [
        'date',
        'time',
        'observation',
        'vaccine_id',
        'historias_clinica_id',
    ];
}
