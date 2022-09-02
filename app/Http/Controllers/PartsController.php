<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use App\Http\Resources\Parts\PartResource;

class PartsController extends Controller
{
    public function index()
    {
        return PartResource::collection(Part::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $part = Part::where(['name'=> $request->name])->first();
        
        if($part) return response()->json([
            'status' => 'error',
            'message' => 'Part already exists.',
        ]);

        Part::create([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Part created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $part = Part::findOrFail($id);
        
        if(!$part) return response()->json([
            'status' => 'error',
            'message' => 'Part does not exists.',
        ]);

        $part->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Part updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $part = Part::findOrFail($id);
        $part->delete();

        return response()->json([
            'message' => 'Part deleted successfully.',
            'status' => 'success'
        ]);
    }
}
