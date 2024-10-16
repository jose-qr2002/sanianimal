<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    protected $table = "species";

    protected $fillable = ["specie"];

    public function pets() {
        return $this->hasMany(Pet::class);
    }
}
