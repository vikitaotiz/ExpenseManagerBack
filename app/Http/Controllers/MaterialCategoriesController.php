<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialCategory;
use App\Http\Resources\MaterialCategories\MaterialCategoryResource;

class MaterialCategoriesController extends Controller
{
    public function index()
    {
        return MaterialCategoryResource::collection(MaterialCategory::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $material_category = MaterialCategory::where(['name'=> $request->name])->first();
        
        if($material_category) return response()->json([
            'status' => 'error',
            'message' => 'MaterialCategory already exists.',
        ]);

        MaterialCategory::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'MaterialCategory created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $material_category = MaterialCategory::findOrFail($id);
        
        if(!$material_category) return response()->json([
            'status' => 'error',
            'message' => 'MaterialCategory does not exists.',
        ]);

        $material_category->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'MaterialCategory updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $material_category = MaterialCategory::findOrFail($id);
        $material_category->delete();

        return response()->json([
            'message' => 'MaterialCategory deleted successfully.',
            'status' => 'success'
        ]);
    }
}
