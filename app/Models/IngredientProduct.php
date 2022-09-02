<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_id',
        'product_id'
    ];
}
