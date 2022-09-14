<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Http\Resources\Ingredients\IngredientResource;

class IngredientsController extends Controller
{
    public function index()
    {
        return IngredientResource::collection(Ingredient::all());
    }

    public function store(Request $request)
    {
        $ingredient = Ingredient::where([
            'name'=> $request->name, 
            'store_id' => $request->store_id
        ])->first();
        
        if($ingredient) return response()->json([
            'status' => 'error',
            'message' => 'Ingredient already exists in this store.',
        ]);

        Ingredient::create([
            'name' => $request->name,
            'input_unit' => $request->input_unit,
            'processing_unit' => $request->processing_unit,
            'buying_price' => $request->buying_price,
            'store_id' => $request->store_id,
            'material_category_id' => $request->material_category_id,
            'supplier_id' => $request->supplier_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Ingredient created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        
        if(!$ingredient) return response()->json([
            'status' => 'error',
            'message' => 'Ingredient does not exists.',
        ]);

        $ingredient->update([
            'name' => $request->name,
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity,
            'buying_price' => $request->buying_price,
            'store_id' => $request->store_id,
            'material_category_id' => $request->material_category_id,
            'supplier_id' => $request->supplier_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Ingredient updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return response()->json([
            'message' => 'Ingredient deleted successfully.',
            'status' => 'success'
        ]);
    }
}
