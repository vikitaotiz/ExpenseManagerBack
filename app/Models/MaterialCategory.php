<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_id'];

    public function ingredients()
    {
        return $this->hasMany(Ingredients::class);
    }
}
