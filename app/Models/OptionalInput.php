<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'number',
        'text'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
