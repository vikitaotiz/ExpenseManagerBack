<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Resources\Stores\StoreResource;

class StoresController extends Controller
{
    public function index()
    {
        return StoreResource::collection(Store::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required'
        ]);

        $data = Store::where('company_id', $request->company_id)->where('name', $request->name)->first();
        
        if($data) return response()->json([
            'status' => 'error',
            'message' => 'Store already exist for this company. Try different a store name or company'
        ]);

        $store = Store::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Store created successfully'
        ]);;
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return response()->json([
            "status" => "success",
            "message" => "Store deleted successfully."
        ]);
    }
}
