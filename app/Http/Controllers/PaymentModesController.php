<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMode;
use App\Http\Resources\PaymentModes\PaymentModeResource;

class PaymentModesController extends Controller
{
    public function index()
    {
        return PaymentModeResource::collection(PaymentMode::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $material_category = PaymentMode::where(['name'=> $request->name])->first();
        
        if($material_category) return response()->json([
            'status' => 'error',
            'message' => 'PaymentMode already exists.',
        ]);

        PaymentMode::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'PaymentMode created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $material_category = PaymentMode::findOrFail($id);
        
        if(!$material_category) return response()->json([
            'status' => 'error',
            'message' => 'PaymentMode does not exists.',
        ]);

        $material_category->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'PaymentMode updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $material_category = PaymentMode::findOrFail($id);
        $material_category->delete();

        return response()->json([
            'message' => 'PaymentMode deleted successfully.',
            'status' => 'success'
        ]);
    }
}
