<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'payment_methdd',
        'status',
        'customer_id',
        'subtotal',
        'discount',
        'total',
    ];

    public function details() {
        return $this->hasMany(SaleDetail::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
