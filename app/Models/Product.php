<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "category_id",
        "company_id",
        "selling_price"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function unit()
    // {
    //     return $this->belongsTo(Unit::class);
    // }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // public function store()
    // {
    //     return $this->belongsTo(Store::class);
    // }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_products');
    }
}
