<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'initial_amount',
        'amount_settled',
        'balance'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
