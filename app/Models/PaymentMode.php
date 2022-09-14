<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_id'];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
