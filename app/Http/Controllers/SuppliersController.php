<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Resources\Suppliers\SupplierResource;

class SuppliersController extends Controller
{
    public function index()
    {
        return SupplierResource::collection(Supplier::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $supplier = Supplier::where(['name'=> $request->name])->first();
        
        if($supplier) return response()->json([
            'status' => 'error',
            'message' => 'Supplier already exists.',
        ]);

        Supplier::create([
            'name' => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "company_id" => $request->company_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier created successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        
        if(!$supplier) return response()->json([
            'status' => 'error',
            'message' => 'Supplier does not exists.',
        ]);

        $supplier->update([
            'name' => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "company_id" => $request->company_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json([
            'message' => 'Supplier deleted successfully.',
            'status' => 'success'
        ]);
    }
}
