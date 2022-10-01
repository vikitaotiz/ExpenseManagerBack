<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'company_id'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
