<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'opening_stock',
        'unit_price',
        "selling_price",
        'purchases',
        'purchases_cost',
        'closing_stock',
        'usage',
        'closing_stock_cost',
        'system_usage',
        'usage_cost',
        'stock_shortage_cost',
        'stock_shortage',
        'user_id',
        'units',
        'parts',
        'company_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    } 
}
