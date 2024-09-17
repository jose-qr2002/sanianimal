<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sex',
        'color',
        'pedigree',
        'customer_id',
        'specie_id',
        'birthdate',
        'race',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'birthdate' => 'date',
        ];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
