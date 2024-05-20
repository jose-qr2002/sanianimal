<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    protected $table = "especies";

    protected $fillable = ["especie"];

    public function mascota() {
        return $this->hasMany(Mascota::class);
    }
}
