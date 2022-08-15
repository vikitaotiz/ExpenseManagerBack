<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model){
            if(empty($model->slug)) {
                $model->slug = Str::slug($model->title . " " . Str::uuid(), '-');
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
