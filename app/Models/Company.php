<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'phone', 'email', 'address', 'city', 'country'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model){
            if(empty($model->slug)) {
                $model->slug = Str::slug($model->title . " " . Str::uuid(), '-');
            }
        });
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function optional_inputs()
    {
        return $this->hasMany(OptionalInput::class);
    }
}
