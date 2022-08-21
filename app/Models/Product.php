<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "buying_price",
        "selling_price",
        "description",
        "category_id",
        "unit_id",
        "company_id",
        "store_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function spilages()
    {
        return $this->hasMany(Spilage::class);
    }
}
