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
        $unit = Unit::where('title', $request->title)->first();

        if($unit) return response([
            'status' => 'error',
            'message' => 'Unit already exists'
        ]);

        Unit::create([
            'title' => $request->title,
            'symbol' => $request->symbol
        ]);

        return response([
            'status' => 'success',
            'message' => 'Unit created successfully'
        ]);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return response([
            'status' => 'success',
            'message' => 'Unit deleted successfully'
        ]);
    }
}
