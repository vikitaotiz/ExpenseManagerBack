<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'phone', 'email', 'address', 'city', 'country'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model){
            if(empty($model->slug)) {
                $model->slug = Str::slug($model->name . " " . Str::uuid(), '-');
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

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function payment_modes()
    {
        return $this->hasMany(PaymentMode::class);
    }

    public function material_categories()
    {
        return $this->hasMany(MaterialCategory::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
