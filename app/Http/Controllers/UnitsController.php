<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Http\Resources\Units\UnitResource;

class UnitsController extends Controller
{
    public function index()
    {
        return UnitResource::collection(Unit::orderBy('created_at', 'desc')->get());
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:units',
            'symbol' => 'required'
        ]);

        $unit = Unit::create([
            'title' => $request->title,
            'symbol' => $request->symbol
        ]);

        return $unit;
    }
}
