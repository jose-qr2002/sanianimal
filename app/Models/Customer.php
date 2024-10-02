<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'lastname',
        'n_document',
        'sex',
        'email',
        'phone',
        'address',
        'birthdate',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'birthdate' => 'date',
        ];
    }

    public function pets() {
        return $this->hasMany(Pet::class);
    }
}
