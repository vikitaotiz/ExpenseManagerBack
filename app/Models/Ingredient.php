<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'input_unit',
        'processing_unit',
        'buying_price',
        'store_id',
        'material_category_id',
        // 'supplier_id'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'ingredient_products');
    }

    public function material_category()
    {
        return $this->belongsTo(MaterialCategory::class);
    }
}
