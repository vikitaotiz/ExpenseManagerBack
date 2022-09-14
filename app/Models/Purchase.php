<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'quantity',
        'issued',
        'opening_stock',
        'closing_stock',
        'measurement',
        'total_amount',
        'unit_price',
        'balance',
        'user_id',
        'company_id',
        'payment_mode_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_mode()
    {
        return $this->belongsTo(PaymentMode::class);
    }
}
